<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(){
        return view('dashboard.penjualan.index');
    }
}
