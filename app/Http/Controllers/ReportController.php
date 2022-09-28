<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('dashboard.reports.index');
    }

    public function print(Request $request , $date){
        return view('dashboard.reports.print',[
            'date' => $date,
            'orders' => Order::with('barangOrder')->whereDate('created_at','=',$date)->get()
        ]);
    }
}
