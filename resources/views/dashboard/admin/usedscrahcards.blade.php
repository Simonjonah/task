@include('dashboard.admin.vtu.header')
@include('dashboard.admin.vtu.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial Number</th>
                    <th>Pin</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Use</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Date</th>
                    <th>Delete</th>
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
                    @foreach ($view_usedcards as $view_usedcard)
                  <tr>

                    <td>{{ $view_usedcard->pin }}</td>
                    <td>{{ $view_usedcard->serial_number }}</td>
                    <td>{{ $view_usedcard->amount }}</td>
                    <td>{{ $view_usedcard->type }}</td>
                    <td><a href="{{ url('admin/usedcard/'.$view_usedcard->ref_no) }}" class="btn btn-warning">Used</a></td>

                    <td>@if ($view_usedcard->status == null)
                        <span class="badge badge-primary"> Available</span>
                       @elseif($view_usedcard->status == 'pending')
                       <span class="badge badge-warning"> Initiated</span>
                       @elseif($view_usedcard->status == 'success')
                       <span class="badge badge-danger"> Paid</span>
                       @elseif($view_usedcard->status == 'camcelled')
                       <span class="badge badge-danger"> Cancelled</span>

                       @elseif($view_usedcard->status == 'used')
                       <span class="badge badge-dark"> Used By Admin</span>
                       @endif</td>
                    <td><a href="{{ url('admin/viewcard/'.$view_usedcard->ref_no) }}" class="btn btn-info">View</a></td>
                    <td><a href="{{ url('admin/editcard/'.$view_usedcard->ref_no) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ url('admin/deletecard/'.$view_usedcard->ref_no) }}" class="btn btn-danger">Delete</a></td>
                    <td>{{ $view_usedcard->created_at->format('d M, Y') }}</td>
                     
                  </tr>
                    @endforeach
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial Number</th>
                    <th>Pin</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Use</th>

                    <th>Status</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Date</th>
                    <th>Delete</th>
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

  @include('dashboard.admin.vtu.footer')


  {{-- <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="../../dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html> --}}


