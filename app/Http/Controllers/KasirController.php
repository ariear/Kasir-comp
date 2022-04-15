<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function invoice($no_order){
        $order = Order::with('barangOrder')->where('no_order', $no_order)->first();

        return view('dashboard.barang.invoice',[
            'order' => $order
        ]);
    }
}
