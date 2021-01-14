<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->page)) {
            $uri = parent::$baseUri . 'blog?page=' . $request->page;
        } else {
            $uri = parent::$baseUri . 'blog';
        }
        $response = Http::withToken(parent::$token)->get($uri);

        $data = $response->json()['data'];
        $data['links'] = str_replace(parent::$baseUri . 'blog', route('blog'), $data['links']);

        $index = 'blog';
        $baseImg = parent::$baseImg;
        return view('pages.blog', compact('data', 'index', 'baseImg'));
    }
}
