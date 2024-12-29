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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Track ID</th>
                    <th>Project Name</th>
                    <th>Body</th>
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
                    @foreach ($view_projects as $view_project)
                  <tr>

                    <td>{{ $view_project->ref_no }}</td>
                    <td><a href="{{ url('admin/project/viewprojectask/'.$view_project->id) }}" target="_blank" rel="noopener noreferrer">{{ $view_project->project_name }}</a></td>
                    <td>{!! $view_project->body !!}</td>
                    <td><a href="{{ url('admin/project/projectedit/'.$view_project->ref_no) }}"
                      class='btn btn-info'>
                       <i class="far fa-edit"></i>
                   </a></td>
                     
                       
                     <td><a href="{{ url('admin/project/projectdestroy/'.$view_project->ref_no) }}"
                      class='btn btn-danger'>
                       <i class="far fa-trash-alt"></i>
                   </a></td>
                   <td>{{ $view_project->created_at->format('D d, M Y, H:i')}}</td>
                    
                  </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Track ID</th>
                        <th>Projects Name</th>
                        <th>Body</th>
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

