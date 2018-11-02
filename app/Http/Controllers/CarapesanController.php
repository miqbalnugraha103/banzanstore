<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarapesanController extends Controller
{
    public function index(){
        return view('caraPesan');
    }
}
