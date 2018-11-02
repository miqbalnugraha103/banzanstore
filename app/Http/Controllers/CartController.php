<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function checkout(Request $request){
        $text = 'Barang%20%0A';
        $barang = Session::get('barang');
        // Session::forget('barang');
        $i = 1;
        foreach ($barang as $key => $value) {
            $text .= 'SKU : '.$value->sku.'%20%0A';
            $text .= 'Nama : '.$value->nama.'%20%0A';
            $text .= 'Berat : '.$value->berat.'%20%0A';
            if($value->varian_1){
                $text .= 'Varian_1 : '.$value->varian_1.'%20%0A';
            }
            if($value->varian_2){
                $text .= 'Varian_2 : '.$value->varian_2.'%20%0A';
            }
            $text .= 'Harga : '."Rp " . number_format($value->harga,2,',','.').'%20%0A';
            $text .= 'Jumlah : '.$value->jumlah_barang.'%20%0A';
            $text .= 'Subtotal : '."Rp " . number_format(($value->harga*$value->jumlah_barang),2,',','.').'%20%0A%20%0A';
            $i++;
        }
        if($request->checkbox){
            $text .= 'Dropship%20%0A';
            $text .= 'Nama Pengirim : '.$request->pengirim.'%20%0A';
            $text .= 'No Telp : '.$request->no_telp_dropship.'%20%0A%20%0A';
        }
        $text .= 'Penerima%20%0A';
        $text .= 'A/N : '.$request->nama_penerima.'%20%0A';
        $text .= 'Pengiriman : '.$request->no_telp.'%20%0A';
        $text .= 'Pengiriman : '.$request->pengiriman.'%20%0A';
        $text .= 'Alamat : '.$request->alamat.'%20%0A%20%0A';
        return redirect('https://api.whatsapp.com/send?phone=6285727772994&text='.$text);
    }

    public function index(){
        $value = session()->get('barang');
        // dd($value);
        // $value = session()->forget('barang');
        return view('cart', ['barang' => $value]);
    }

    public function addCart(Request $request){
        // if($request->varian_1)
        $barang = session()->get('barang');
        if($barang){
            foreach ($barang as $key => $data) {
                if($data->sku == $request->sku_barang){
                    $data->jumlah_barang = $request->jumlah_barang;
                    $cek = 'ada';
                }
            }
        }
        if (!isset($cek)) {
            $barang = (object)[
                'nama' => $request->name,
                'sku' => $request->sku_barang,
                'berat' => $request->berat_barang,
                'varian_1' => $request->varian_1,
                'varian_2' => $request->varian_2,
                'gambar' => $request->gambar,
                'harga' => $request->harga_barang,
                'jumlah_barang' => $request->jumlah_barang
            ];
            $request->session()->push('barang', $barang);    
        } else {
            $request->session()->flash('status', 'Barang Sudah Ada Di Cart!');
        }
        return redirect('/keranjang');
    }

    public function deleteCart($index){
        $barang = Session::get('barang');
        Session::forget('barang');
        $i = 1;
        foreach ($barang as $key => $value) {
            if($i != $index){
                session()->push('barang', $value);
            }
            $i++;
        }
        $barang = Session::get('barang');
        session()->flash('status', 'Barang Sudah Terhapus!');
        return redirect('/keranjang');
    }

    public function editCart($index,$operasi){
        $barang = Session::get('barang');
        Session::forget('barang');
        $i = 1;
        foreach ($barang as $key => $value) {
            if($i == $index){
                if($operasi == 0){
                    $value->jumlah_barang = $value->jumlah_barang-1;
                } else {
                    $value->jumlah_barang = $value->jumlah_barang+1;
                }
            }
            session()->push('barang', $value);
            $i++;
        }
        $barang = Session::get('barang');
        session()->flash('status', 'Barang Sudah Teredit!');
        return redirect('/keranjang');
    }
}
