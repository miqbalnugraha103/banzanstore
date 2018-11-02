<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\scraping_data;

class SearchController extends Controller
{
    public function index($nama,$page){
        $scraping_data = new scraping_data();
        $data = $scraping_data->searchBarang("https://www.jakmall.com/search?q=".$nama."&cities%5B0%5D=DKI+Jakarta&sort=match&page=".$page);
        // dd($data);
        return view('search', ['data' => $data, 'cari' => $nama, 'page' => $page]);
    }
}
