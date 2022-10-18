<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(){
        return view('dashboard.reports.index');
    }

    public function print(Request $request , $date){
        $title = 'Laporan Tanggal ' . $date;
        $orders = Order::with('barangOrder')->whereDate('created_at','=',$date)->get();
        $parseDate = Carbon::parse($date);

        if ($request->query('month')) {
            $firstDayofPreviousMonth = $parseDate->startOfMonth()->toDateTimeString();
            $lastDayofPreviousMonth = $parseDate->endOfMonth()->toDateTimeString();

            $title = 'Laporan Bulan ' . $parseDate->format('F Y');
            $orders = Order::with('barangOrder')->where('created_at','<', $lastDayofPreviousMonth)->where('created_at','>', $firstDayofPreviousMonth)->get();
        }

        return view('dashboard.reports.print',[
            'title' => $title,
            'orders' => $orders
        ]);
    }

    public function reportMonth(){
        return view('dashboard.reports.month');
    }
}
