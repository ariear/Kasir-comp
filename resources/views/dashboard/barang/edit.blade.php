@extends('dashboard.index')
@section('content')
    <div class="pt-5"></div>
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Edit Barang</h3>
        </div>
        <form action="/dashboard/barang/{{ $barangs->id }}" method="post">
            @method('put')
            @csrf
        <div class="card-body">
          <div class="form-group">
            <label>ID Barang</label>
            <input type="text" name="id_barang" class="form-control" value="{{ old('id_barang', $barangs->id_barang) }}">
            @error('id_barang')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" class="form-control">
                <option value=""></option>
                @foreach ($categories as $category)
                @if ($category->id == $barangs->category_id)
                <option value="{{ $category->id }}" selected>{{ $category->nama_kategori }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                @endif
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang', $barangs->nama_barang) }}">
            @error('nama_barang')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Merk</label>
            <input type="text" name="merk" class="form-control" value="{{ old('merk', $barangs->merk) }}">
            @error('merk')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stock" class="form-control" value="{{ old('stock', $barangs->stock) }}">
            @error('stock')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" class="form-control" value="{{ old('harga_beli', $barangs->harga_beli) }}">
            @error('harga_beli')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" class="form-control" value="{{ old('harga_jual', $barangs->harga_jual) }}">
            @error('harga_jual')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary">Edit Barang</button>
          </div>
        </div>
        </form>
        <!-- /.card-body -->
      </div>
@endsection
