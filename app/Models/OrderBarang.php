<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderBarang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}
