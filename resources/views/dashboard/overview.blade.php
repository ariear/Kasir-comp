@extends('dashboard.index')
@section('content')
<h2 class="mb-2 mt-4">Overview</h2>
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $barang }}</h3>

        <p>Nama Barang</p>
      </div>
      <div class="icon">
        <i class="fas fa-shopping-cart"></i>
      </div>
      <a href="/dashboard/barang" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $jmlstock }}</h3>

        <p>Stok Barang</p>
      </div>
      <div class="icon">
        <i class="fas fa-chart-pie"></i>
      </div>
      <a href="/dashboard/barang" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $terjual_hari_ini }}</h3>

        <p>Terjual Hari Ini</p>
      </div>
      <div class="icon">
        <i class="fas fa-shopping-cart"></i>
      </div>
      <a href="/dashboard/reports" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small card -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $category }}</h3>

        <p>Kategori Barang</p>
      </div>
      <div class="icon">
        <i class="fas fa-chart-pie"></i>
      </div>
      <a href="/dashboard/categories" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <!-- ./col -->
</div>

<div class="row pt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-danger">
          <h3 class="card-title">Barang yg mau habis</h3>

          <div class="card-tools">

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $barang->id_barang }}</td>
                  <td>{{ $barang->nama_barang }}</td>
                  <td>{{ $barang->stock }}</td>
                </tr>
                @empty
                    <td>Barang masih banyak semua</td>
                @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
