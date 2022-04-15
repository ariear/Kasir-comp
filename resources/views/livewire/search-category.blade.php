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
                <th>Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $category->nama_kategori }}</td>
                  <td class="d-flex">
                      <a href="/dashboard/categories/{{ $category->id }}/edit"><button class="btn btn-warning mr-2">Edit</button></a>
                      <form action="/dashboard/categories/{{ $category->id }}" method="post">
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
          {{ $categories->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

