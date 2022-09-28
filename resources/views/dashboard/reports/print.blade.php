<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KASIR COMP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminLte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLte/dist/css/adminlte.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <div class="card">
        <div class="card-header">
          <h4>Laporan Tanggal {{ $date }}</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table  class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>NO</th>
              <th>NO ORDER</th>
              <th>NAMA KASIR</th>
              <th>BARANG</th>
              <th>QTY</th>
              <th>TOTAL</th>
              <th>BAYAR</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($orders as $order)
            <tr>
              <th class="font-weight-normal">{{ $loop->iteration }}</th>
              <th class="font-weight-normal">{{ $order->no_order }}</th>
              <th class="font-weight-normal">{{ $order->nama_kasir }}</th>
              <th class="font-weight-normal">
                @foreach ($order->barangOrder as $item)
                    <li>{{ $item->barang ? $item->barang->nama_barang : '???' }}</li>
                @endforeach
              </th>
              <th class="font-weight-normal">{{ $order->barangOrder->sum('qty') }}</th>
              <th class="font-weight-normal">{{ number_format($order->grand_total) }}</th>
              <th class="font-weight-normal">{{ number_format($order->pembayaran) }}</th>
            </tr>
            @empty
                <tr>
                    <td>Transaksi tidak ada</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>TOTAL : {{ number_format($orders->sum('grand_total')) }}</th>
                    <th></th>
                  </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>

</div>
<!-- ./wrapper -->

@livewireScripts
<script src="{{ asset('AdminLte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminLte/dist/js/adminlte.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="/AdminLte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/AdminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/AdminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/AdminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/AdminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/AdminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/AdminLte/plugins/jszip/jszip.min.js"></script>
<script src="/AdminLte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/AdminLte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/AdminLte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/AdminLte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/AdminLte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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

  window.addEventListener('DOMContentLoaded', (event) => {
   		window.print()
	});
</script>
</body>
</html>
