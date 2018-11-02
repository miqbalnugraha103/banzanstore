<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\scraping_data;

class KategoriController extends Controller
{
    public function index($kategori, $page){
    	$scraping_data = new scraping_data();
    	// dd($scraping_data->barang($kategori, $page));
    	return view('kategori', ['data' => $scraping_data->barang($kategori, $page), 'kategori' => $kategori, 'page' => $page]);
    }
}
