<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\scraping_data;

class BarangController extends Controller
{
    public function index($toko, $barang){
    	$scraping_data = new scraping_data();
    	$id = 0;
    	if(isset($_GET['id'])){
    		$id = $_GET['id'];
    	} 
        $url = "https://www.jakmall.com/".$toko."/".$barang.'#'.$id;
    	$data = $scraping_data->detailBarang($url);
    	// dd($data->informasi);
    	// dd($scraping_data->detailBarang($url));
    	return view('barang', ['data' => $scraping_data->detailBarang($url), 'urlBarang' => $barang]);
    }
}
