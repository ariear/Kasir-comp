@extends('dashboard.index')
@section('content')
    <div class="pt-5"></div>
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Edit Kategori</h3>
        </div>
        <form action="/dashboard/categories/{{ $category->id }}" method="post">
            @method('put')
            @csrf
        <div class="card-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori', $category->nama_kategori) }}">
            @error('nama_kategori')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary">Edit Kategori</button>
          </div>
        </div>
        </form>
        <!-- /.card-body -->
      </div>
@endsection
