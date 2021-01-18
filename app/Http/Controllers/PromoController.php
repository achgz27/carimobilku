<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PromoController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->page)) {
            $uri = parent::$baseUri . 'promo?page=' . $request->page;
        } else {
            $uri = parent::$baseUri . 'promo';
        }

        $response = Http::withToken(parent::$token)->get($uri);

        $data = $response->json()['data'];
        $data['links'] = str_replace(parent::$baseUri . 'promo', route('promo'), $data['links']);

        $index = 'promo';
        $baseImg = parent::$baseImg;
        return view('pages.promo', compact('data', 'index', 'baseImg'));
    }

    public function detail($slug)
    {
        $uri = parent::$baseUri . 'promo/' . $slug;
        $response = Http::withToken(parent::$token)->get($uri);

        $data = $response->json()['data'];

        $index = 'promo';
        $baseImg = parent::$baseImg;
        return view('pages.promo_detail', compact('data', 'index', 'baseImg'));
    }
}
