<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $uri = parent::$baseUri . 'beranda';
        $response = Http::withToken(parent::$token)->get($uri);

        $uri_filter = parent::$baseUri . 'garasi?getfilter=';
        $response_filter = Http::withToken(parent::$token)->get($uri_filter);

        $filter = $response_filter->json()['data'];

        $data = $response->json()['data'];

        $index = 'beranda';
        $baseImg = parent::$baseImg;

        // dd($filter['brand']);
        return view('pages.beranda', compact('data','filter', 'index', 'baseImg'));
    }
}
