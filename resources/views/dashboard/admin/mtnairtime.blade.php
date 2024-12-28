




@include('dashboard.admin.vtu.header')


  @include('dashboard.admin.vtu.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">MTN Airtime</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">MTN Airtime </li>
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
              <h3 class="card-title">Add Airtime</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  
                  <form action="{{ url('admin/createmtnairtime') }}" method="post" enctype="multipart/form-data">
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
                    
                  <div class="card-body">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Amount</label>
                    
                      <input type="text" name="amount" class="form-control" @error('amount') 
                          
                      @enderror value="" id="exampleInputEmail1" placeholder="Amount"> 
                    </div>
                    @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror




                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                  
                    <input type="number" name="phone" class="form-control" @error('phone') 
                        
                    @enderror value="" id="exampleInputEmail1" placeholder="Phone"> 
                  </div>
                  @error('phone')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror



                <div class="form-group">
                  <label for="exampleInputEmail1">serviceID MTN</label>
                
                  <input type="text" name="serviceID" class="form-control" @error('service ID') 
                      
                  @enderror value="mtn" id="exampleInputEmail1" placeholder="serviceID"> 
                </div>
                @error('serviceID')
                <span class="text-danger">{{ $message }}</span>
                @enderror

               
                  </div>
                  <!-- /.card-body -->
    
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
      @include('dashboard.admin.vtu.footer')