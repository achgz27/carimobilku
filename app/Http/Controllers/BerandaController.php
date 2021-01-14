<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $index = 'beranda';
        return view('pages.beranda', compact('index'));
    }
}
