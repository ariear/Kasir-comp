<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Order;
use Carbon\Carbon;

class OverviewDashboard extends Controller
{
    public function index(){
        $jmlstock = 0;
        $barang = Barang::all();
        foreach ($barang as $key ) {
            $jmlstock += $key->stock;
        }

        return view('dashboard.overview',[
            'jmlstock' => $jmlstock,
            'barang' => Barang::all()->count(),
            'category' => Category::all()->count(),
            'barangs' => Barang::where('stock', '<',4)->get(),
            'terjual_hari_ini' => Order::whereDate('created_at', '=' , Carbon::today()->toDateString())->count()
        ]);
    }
}
