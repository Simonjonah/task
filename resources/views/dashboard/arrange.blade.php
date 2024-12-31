@include('dashboard.header')
@include('dashboard.sidebar')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Task Managements</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Task Managements</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<style>



  #draggable-list {
    list-style: none;
    padding: 0;
    width: 200px;
}

.draggable-item {
    padding: 10px;
    margin: 5px 0;
    background-color: #f4f4f4;
    border: 1px solid #ddd;
    cursor: grab;
    
}

.draggable-item.over {
    border: 2px dashed #000;
    background-color: #e9ecef;
}
</style>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="color: red">{{ $project->project_name }} Task</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
                <ul id="draggable-list">
                  @foreach ($tasks as $task)
                  <li data-id="{{ $task->id }}" draggable="true" class="draggable-item">{{ $task->task_name }}</li>
                  @endforeach
              </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 <script>


const list = document.getElementById('draggable-list');
  let draggedItem = null;


list.addEventListener('dragstart', (e) => {
    draggedItem = e.target;
    e.target.style.opacity = '0.5';
});

list.addEventListener('dragend', (e) => {
    e.target.style.opacity = '1'; 
    draggedItem = null;
});

list.addEventListener('dragover', (e) => {
    e.preventDefault();
    const hoveredItem = e.target;
    //DRAG OVER
    if (hoveredItem && hoveredItem !== draggedItem && hoveredItem.classList.contains('draggable-item')) {
        const bounding = hoveredItem.getBoundingClientRect();
        const offset = e.clientY - bounding.top + bounding.height / 2;

       
        if (offset > bounding.height / 2) {
            hoveredItem.after(draggedItem);
        } else {
            hoveredItem.before(draggedItem);
        }
    }
});


 </script>


  @include('dashboard.footer')

