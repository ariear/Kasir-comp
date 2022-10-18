<div>
    <h2 class="pt-5 pb-3">{{ $title_date }}</h2>

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar laporan</h3>
          <div class="card-tools d-flex">
              <a href="/dashboard/reports/print/{{ $dateCompare }}?month=true" class="btn btn-primary mr-3">CETAK</a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>NO</th>
              <th>NO ORDER</th>
              <th>NAMA KASIR</th>
              <th>QTY</th>
              <th>TOTAL</th>
              <th>BAYAR</th>
              <th>AKSI</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($orders as $order)
            <tr>
              <th class="font-weight-normal">{{ $loop->iteration }}</th>
              <th class="font-weight-normal">{{ $order->no_order }}</th>
              <th class="font-weight-normal">{{ $order->nama_kasir }}</th>
              <th class="font-weight-normal">{{ $order->barangOrder->sum('qty') }}</th>
              <th class="font-weight-normal">{{ number_format($order->grand_total) }}</th>
              <th class="font-weight-normal">{{ number_format($order->pembayaran) }}</th>
              <th>
                <a href="/dashboard/penjualan/invoice/{{ $order->no_order }}" class="btn btn-primary"><i class="fas fa-print"></i></a>
              </th>
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
                    <th>TOTAL : {{ number_format($orders->sum('grand_total')) }}</th>
                    <th></th>
                    <th></th>
                  </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
</div>
