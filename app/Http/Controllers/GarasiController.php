<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GarasiController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->page)) {
            $uri = parent::$baseUri . 'garasi?page=' . $request->page;
        } else {
            $uri = parent::$baseUri . 'garasi';
        }

        $response = Http::withToken(parent::$token)->get($uri);

        $data = $response->json()['data'];
        $data['links'] = str_replace(parent::$baseUri . 'garasi', route('garasi'), $data['links']);

        $index = 'garasi';
        $baseImg = parent::$baseImg;
        return view('pages.garasi', compact('data', 'index', 'baseImg'));
    }

    public function detail($slug)
    {
        $uri = parent::$baseUri . 'garasi/' . $slug;
        $response = Http::withToken(parent::$token)->get($uri);

        $data = $response->json()['data'];

        $index = 'garasi';
        $baseImg = parent::$baseImg;
        return view('pages.garasi_detail', compact('data', 'index', 'baseImg'));
    }
}
