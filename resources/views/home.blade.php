@include('dashboard.header')

  <!-- /.navbar -->
  @include('dashboard.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if (Auth::guard('web')->user()->status == null)
    <li class="breadcrumb-item active" style="color: red">Please  wait for approval</li>
    @elseif(Auth::guard('web')->user()->status == 'suspend')
    <li class="breadcrumb-item active"  style="color: red">You are Suspended</li>
    @elseif (Auth::guard('web')->user()->status == 'approved' && Auth::guard('web')->user()->role == 'POS')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sale By Transfer</span>
                <span class="info-box-number">
                  {{ $moneytransfer }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cash Sale</span>
                <span class="info-box-number">{{ $moneynormal }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Daily Sales</span>
                <span class="info-box-number">{{ $countdailysales }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">POS Sales </span>
                <span class="info-box-number">{{ $possales }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Exchange Payment</span>
                <span class="info-box-number">₦ {{ $exchangepayment }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Money for Today </span>
                <span class="info-box-number">{{ $money }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

       
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Sales</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Sale ID</th>
                      <th>Product</th>
                      <th>Payment Method</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($moneynormalshows as $moneynormalshow)
                      <tr>
                        <td><a href="{{ url('web/viewsinglesalesuser/'.$moneynormalshow->ref_no1) }}">{{ $moneynormalshow->ref_no1 }}</a></td>
                        <td>{{ $moneynormalshow->product }}</td>
                        <td>@if ($moneynormalshow->payment_method == 'POS')
                          <span class="badge badge-primary">POS</span>
                        @elseif ($moneynormalshow->payment_method == 'Exchange')
                        <span class="badge badge-danger">Exchange</span>
                        @elseif ($moneynormalshow->payment_method == 'CASH')
                        <span class="badge badge-success">Cash Sale</span>
                        @elseif ($moneynormalshow->payment_method == 'Bank Transfer')
                        <span class="badge badge-dark">Bank Transfer</span>
                        @else
                        @endif</td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $moneynormalshow->current_stock_sale_price }}</div>
                        </td>
                      </tr>
                      @endforeach
                  
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div> --}}
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently  transfer Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                 @foreach ($moneytransefershows as $moneytransefershow)
                 <li class="item">
                  <div class="product-info">
                    <a href="{{ url('web/viewsinglesalesuser/'.$moneytransefershow->ref_no1) }}" class="product-title">Samsung TV
                      <span class="badge badge-warning float-right">{{ $moneytransefershow->current_stock_sale_price }}</span></a>
                    <span class="product-description">
                      {{ $moneytransefershow->product }}
                    </span>
                  </div>
                </li>
               
                 @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ url('web/viewmytransfer') }}" class="uppercase">View All transfer sale</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endif

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
@include('dashboard.footer')