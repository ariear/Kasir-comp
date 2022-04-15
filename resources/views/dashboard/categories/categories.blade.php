@extends('dashboard.index')
@section('content')
<h2 class="pt-5 pb-3">Data Kategori Barang</h2>

<div class="d-flex justify-content-end mb-3 pr-3">
    <a href="/dashboard/categories/create"><button class="btn btn-primary mr-3">Tambah Kategori</button></a>
    <button class="btn btn-success" onclick="window.location.reload()">Refresh Kategori</button>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@livewire('search-category')

@endsection
