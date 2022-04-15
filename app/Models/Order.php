<?php

namespace App\Models;

use App\Models\OrderBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function barangOrder(){
        return $this->hasMany(OrderBarang::class);
    }
}
