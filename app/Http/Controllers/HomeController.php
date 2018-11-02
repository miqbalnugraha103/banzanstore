<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\scraping_data;

class HomeController extends Controller
{
    public function index(){
    	$scraping_data = new scraping_data();
    	// $data = $scraping_data->home("https://www.jakmall.com");
    	// dd($data->hasil_populer);
    	// dd($data);
    	
    	return view('home', ['data' => $scraping_data->home("https://www.jakmall.com")]);
    }
}
