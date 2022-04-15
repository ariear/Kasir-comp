<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Barang;
use Livewire\Component;

class SearchBarang extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search-barang',[
            'barangs' => Barang::where('nama_barang', 'like' , '%' . $this->search . '%')->latest()->paginate(10)
        ]);
    }
}
