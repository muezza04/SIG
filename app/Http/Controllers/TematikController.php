<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Untuk membaca file

class TematikController extends Controller
{
    public function index()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('home', ['data' => $data]);
    }

    public function ls()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('tematiks.luasWilayah', ['tematik' => $data]);
    }

    public function populasi()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('tematiks.populasi', ['tematik' => $data]);
    }
    
    public function kp()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('tematiks.kepadatanPenduduk', ['tematik' => $data]);
    }

    public function jahe()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('tematiks.jahe', ['tematik' => $data]);
    }

    public function jeruk()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('tematiks.jeruk', ['tematik' => $data]);
    }

    public function kencur()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('tematiks.kencur', ['tematik' => $data]);
    }

    public function kunyit()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('tematiks.kunyit', ['tematik' => $data]);
    }

    public function tematik()
    {
        // Membaca file JSON dari public/data/tematik.json
        $json = File::get(public_path('data/tematik.json'));
        
        // Decode JSON menjadi array asosiatif
        $data = json_decode($json, true);

        // Kirim data ke view
        return view('layouts.allTematik', ['tematik' => $data]);
    }
}
