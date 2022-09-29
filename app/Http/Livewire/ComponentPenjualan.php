<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Barang;
use App\Models\Order;
use App\Models\OrderBarang;
use App\Models\Penjualan;
use Carbon\Carbon;
use Livewire\Component;

class ComponentPenjualan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $pembayaran;
    public $grand_total;
    public $qtyvalue;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPembayaran()
    {
        if ($this->pembayaran == '') {
            redirect('/dashboard/penjualan');
        }
    }

    public function updated(){

    }

    public function addtocart($id,$harga_jual,$inputqty){
        $penjualan = Penjualan::all();
        foreach ($penjualan as $key => $value) {
            if ($value->barang->id == $id) {
                session()->flash('message', 'Barang sudah ada di keranjang');
                return true;
            }
        }
        Penjualan::create([
            'barang_id' => $id,
            'qty' => $inputqty,
            'total' => $harga_jual * $inputqty
        ]);

        $cuyustock = Barang::find($id);
        $cuyustock->update([
            'stock' => $cuyustock->stock - $inputqty
        ]);

    }

    public function hapusBarangCart($id){
        $penjualan = Penjualan::find($id);
        $penjualan->barang->update([
            'stock' => $penjualan->barang->stock + $penjualan->qty
        ]);
        $penjualan->delete();
    }

    public function increment($id){
        $penjualan = Penjualan::with('barang')->find($id);
        $penjualan->update([
            'qty' => $penjualan->qty + 1,
            'total' => $penjualan->barang->harga_jual*($penjualan->qty + 1)
        ]);

        $penjualan->barang->update([
            'stock' => $penjualan->barang->stock - 1
        ]);
    }

    public function decrement($id){
        $penjualan = Penjualan::with('barang')->find($id);
        $penjualan->update([
            'qty' => $penjualan->qty - 1,
            'total' => $penjualan->barang->harga_jual*($penjualan->qty - 1)
        ]);

        $penjualan->barang->update([
            'stock' => $penjualan->barang->stock + 1
        ]);
    }

    public function transaction(){
        $penjualan = Penjualan::all();

            $grand_total = $penjualan->sum('total');
            $pembayaran = $this->pembayaran;
            $kembalian = $this->pembayaran - $penjualan->sum('total');

        $order = Order::create([
            'no_order' => '00'. date('Ymd'). rand(1111,9999),
            'nama_kasir' => auth()->user()->name,
            'grand_total' => $grand_total,
            'pembayaran' => $pembayaran,
            'kembalian' => $kembalian
        ]);

        foreach ($penjualan as $trans => $value) {
            $barang =  array(
                'order_id' => $order->id,
                'barang_id' => $value->barang_id,
                'qty' => $value->qty,
                'total' => $value->total,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            );
            $orderBarang = OrderBarang::insert($barang);
        }

        Penjualan::truncate();

        return redirect('dashboard/penjualan/invoice/' . $order->no_order);
    }

    public function render()
    {
        return view('livewire.component-penjualan',[
            'barangs' => Barang::where('nama_barang', 'like', '%' . $this->search . '%')->orWhere('id_barang','like','%' . $this->search . '%')->paginate(4),
            'keranjangs' => Penjualan::all()
        ]);
    }
}
