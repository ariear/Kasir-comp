<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Category;
use Livewire\Component;

class SearchCategory extends Component
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
        return view('livewire.search-category',[
            'categories' => Category::where('nama_kategori', 'like' , '%' . $this->search . '%')->latest()->paginate(10)
        ]);
    }
}
