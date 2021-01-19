<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class HubungiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('_submit')) {
                foreach ($request->all() as $key => $value) {
                    if (is_numeric($key)) {
                        $data[$value['name']] = $value['value'];
                    }
                }

                $response = Http::withToken(parent::$token)
                    ->withHeaders(['Accept' => 'application/json'])
                    ->withBody(json_encode($data), 'application/json')
                    ->post(parent::$baseUri . 'hubungi');

                $result = $response->json();

                if (array_key_exists('errors', $result)) {
                    return response()->json(['status' => false, 'msg' => Arr::first($result['errors'])[0]]);
                }

                return $result;
            }
        }

        $index = 'hubungi';
        return view('pages.hubungi', compact('index'));
    }
}
