@extends('dashboard.index')
@section('content')
<h2 class="pt-5 pb-3">Data Barang</h2>

<div class="d-flex justify-content-end mb-3 pr-3">
    <a href="/dashboard/barang/create"><button class="btn btn-primary mr-3">Tambah Barang</button></a>
    <button class="btn btn-success" onclick="window.location.reload()">Refresh Barang</button>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@livewire('search-barang')

@endsection
