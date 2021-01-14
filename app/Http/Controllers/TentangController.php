<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index(Request $request)
    {
        $index = 'tentang';
        return view('pages.tentang', compact('index'));
    }
}
