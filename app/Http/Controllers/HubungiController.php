<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HubungiController extends Controller
{
    public function index(Request $request)
    {
        $index = 'hubungi';
        return view('pages.hubungi', compact('index'));
    }
}
