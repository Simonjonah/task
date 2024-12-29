




@include('dashboard.admin.header')


  @include('dashboard.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Projects</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Projects </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Projects</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  
                  <form action="{{ url('admin/project/updateprojects/'.$edit_project->ref_no) }}" method="post" enctype="multipart/form-data">
                    @csrf
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
                    @method('PUT')
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Project Name</label>
                    
                      <input type="text" name="project_name" class="form-control" @error('project_name') 
                          
                      @enderror value="{{ $edit_project->project_name }}" id="exampleInputEmail1" placeholder="Project Name"> 
                    </div>
                    @error('project_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>



                <div class="col-lg-6">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Project Description</label>
                  
                    <textarea rows="5" cols="5" name="body" class="form-control" @error('body') 
                        
                    @enderror placeholder="Project Description"> {!! $edit_project->body !!}</textarea>
                  </div>
                  @error('body')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>

             
                </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  </div>
      @include('dashboard.admin.footer')