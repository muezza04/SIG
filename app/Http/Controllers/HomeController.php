<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        return view('home',[
            'judul' => 'Peta Kecamatan Bogor',
        ]);
    }

    public function about()
    {
        return view('layouts.about');
    }
}
