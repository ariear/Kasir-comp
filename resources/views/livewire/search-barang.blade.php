<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="search" wire:model="search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>NO</th>
                <th>Id Barang</th>
                <th>Kategori</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $barang->id_barang }}</td>
                  <td>{{ $barang->category->nama_kategori }}</td>
                  <td>{{ $barang->nama_barang }}</td>
                  <td>{{ $barang->merk }}</td>
                  <td>{{ $barang->stock }}</td>
                  <td>{{ number_format($barang->harga_beli) }}</td>
                  <td>{{ number_format($barang->harga_jual) }}</td>
                  <td class="d-flex">
                      <a href="/dashboard/barang/{{ $barang->id }}/edit"><button class="btn btn-warning mr-2">Edit</button></a>
                      <form action="/dashboard/barang/{{ $barang->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                  </td>
                </tr>
                @empty
                    <tr>
                        <td>Barang Tidak Ada</td>
                    </tr>
                @endforelse
            </tbody>
          </table>
          {{ $barangs->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
