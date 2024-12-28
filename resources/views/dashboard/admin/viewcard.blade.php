




@include('dashboard.admin.vtu.header')


  @include('dashboard.admin.vtu.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Scrach Card</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Scrach Card </li>
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
              <h3 class="card-title">Add Scrach Card</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="container">
              <div class="row">
                <div class="col-lg-6">
                  
                    {{-- <form action="{{ route('admin.creatprofessional') }}" method="post" enctype="multipart/form-data"> --}}
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
                      <label for="exampleInputEmail1">Serial Number</label>
                    
                      <input type="text" name="serial_number" class="form-control" @error('serial_number') 
                          
                      @enderror value="{{ $view_card->serial_number }}" id="exampleInputEmail1" placeholder="Serial Number"> 
                    </div>
                    @error('serial_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror



                    <div class="form-group">
                      <label for="exampleInputEmail1">Pin Number</label>
                    
                      <input type="text" name="pin" class="form-control" @error('pin') 
                          
                      @enderror value="{{ $view_card->pin }}" id="exampleInputEmail1" placeholder="Pin Number"> 
                    </div>
                    @error('pin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pin Type</label>
                    
                      <select name="type" class="form-control">
                        <option value="{{ $view_card->type }}">{{ $view_card->type }}</option>
                        <option value="WAEC">WAEC</option>
                      </select>
                    </div>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>



                <div class="col-lg-6">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                  
                    <input type="number" name="amount" class="form-control" @error('amount') 
                        
                    @enderror value="{{ $view_card->amount }}" id="exampleInputEmail1" placeholder="Amount"> 
                  </div>
                  @error('amount')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

    
                  {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div> --}}

             
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