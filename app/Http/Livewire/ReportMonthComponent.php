<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Carbon\Carbon;

class ReportMonthComponent extends Component
{
    public function render()
    {
        $date = Carbon::now();
        $firstDayofPreviousMonth = $date->startOfMonth()->toDateTimeString();
        $lastDayofPreviousMonth = $date->endOfMonth()->toDateTimeString();
        
        return view('livewire.report-month-component',[
            'title_date' => 'Laporan Bulan ' . $date->format('F Y'),
            'dateCompare' => Carbon::now(),
            'orders' => Order::with('barangOrder')->where('created_at','<', $lastDayofPreviousMonth)->where('created_at','>', $firstDayofPreviousMonth)->get()
        ]);
    }
}
