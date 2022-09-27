<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Carbon\Carbon;

class ReportComponent extends Component
{
    public $dateReport;

    public function render()
    {
        $title_date = 'Laporan Hari ini';
        $dateCompare = Carbon::today()->toDateString();
        if ($this->dateReport) {
            $title_date = "Laporan tanggal $this->dateReport";
            $dateCompare = $this->dateReport;
        }

        return view('livewire.report-component',[
            'title_date' => $title_date,
            'orders' => Order::with('barangOrder')->whereDate('created_at','=', $dateCompare)->get()
        ]);
    }
}
