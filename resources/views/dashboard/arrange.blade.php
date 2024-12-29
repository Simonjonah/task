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
  .tasks{
    background-color: lightgray;
    color: black;
    list-style: none;
    padding: 5px;
    text-align: center;
    margin: 10px;
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
                <ul id="task-list">
                  @foreach ($tasks as $task)
                    <li class="tasks" data-id="{{ $task->id }}">{{ $task->task_name }}</li>
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
  document.addEventListener('DOMContentLoaded', function () {
    let sortableInstance;
    function initializeSortable() {
        const taskList = document.getElementById('task-list');
        if (!taskList) {
            console.error('Task list element not found.');
            return;
        }
        if (sortableInstance) {
            sortableInstance.destroy();
        }

        sortableInstance = Sortable.create(taskList, {
            animation: 150,
            onEnd: function () {
                const orderedIds = Array.from(taskList.children).map(item => item.dataset.id);
                updateTaskPriorities(orderedIds);
            },
        });
    }

    initializeSortable();
});
</script>

  @include('dashboard.footer')

