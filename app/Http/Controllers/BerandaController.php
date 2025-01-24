<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    // $list_prov = Provinsi:all();
    public function index() 
    {
        return view('beranda.index',[
            'judul' => 'Data Provinsi',
            // 'list_provinsi' => $list_prov,
        ]);
    }
}
