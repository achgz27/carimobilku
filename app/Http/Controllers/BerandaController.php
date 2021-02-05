<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index()
    {
        $uri = parent::$baseUri . 'beranda';
        $response = Http::withToken(parent::$token)->get($uri);

        $data = $response->json()['data'];

        $index = 'beranda';
        $baseImg = parent::$baseImg;
        return view('pages.beranda', compact('data', 'index', 'baseImg'));
    }
}
