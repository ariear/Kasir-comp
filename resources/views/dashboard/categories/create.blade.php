@extends('dashboard.index')
@section('content')
    <div class="pt-5"></div>
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">input Kategori Baru</h3>
        </div>
        <form action="/dashboard/categories" method="post">
            @csrf
        <div class="card-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary">Tambah Kategori</button>
          </div>
        </div>
        </form>
        <!-- /.card-body -->
      </div>
@endsection
