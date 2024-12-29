@include('dashboard.header')
@include('dashboard.sidebar')

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
                    @foreach ($view_project_users as $view_project_user)
                  <tr>

                    <td>{{ $view_project_user->ref_no }}</td>
                    <td><a href="{{ url('web/project/viewprojectaskuser/'.$view_project_user->id) }}" target="_blank" rel="noopener noreferrer">{{ $view_project_user->project_name }}</a></td>
                    <td><a href="{{ url('web/project/arrange/'.$view_project_user->id) }}" target="_blank" rel="noopener noreferrer">{{ $view_project_user->project_name }}</a></td>
                    <td>{!! $view_project_user->body !!}</td>
                    
                    
                   <td>{{ $view_project_user->created_at->format('D d, M Y, H:i')}}</td>
                    
                  </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Track ID</th>
                        <th>Projects Name</th>
                        <th>Body</th>
                       
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

  @include('dashboard.footer')

