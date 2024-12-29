@include('dashboard.admin.header')
@include('dashboard.admin.sidebar')

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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table  class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>Task Name</th>
                    <th>Priority</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Date</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    </div>
                @endif
                    @foreach ($view_tasks as $view_task)
                  <tr>

                    <td>{{ $view_task->task_name }}</td>
                    <td>{{ $view_task->priority }}</td>
                    <td><a href="{{ url('admin/task/edit/'.$view_task->ref_no) }}"
                      class='btn btn-info'>
                       <i class="far fa-edit"></i>
                   </a></td>
                     
                       
                     <td><a href="{{ url('admin/task/destroy/'.$view_task->ref_no) }}"
                      class='btn btn-danger'>
                       <i class="far fa-trash-alt"></i>
                   </a></td>
                   <td>{{ $view_task->created_at->format('D, d M, Y, h:i:a') }}</td>
                    
                  </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                    <tr>
                     
                      <th>Task Name</th>
                      <th>Priority</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Date</th>
                    </tr>
                  </tfoot>
                </table>
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

  @include('dashboard.admin.footer')

