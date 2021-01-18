<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // protected static $baseUri = 'http://localhost/kmg/ms/public/api/';
    // protected static $baseImg = 'http://localhost/kumalagroup/assets/img_marketing/';

    protected static $baseUri = 'https://portal.kumalagroup.co.id/kmg/ms/public/api/';
    protected static $baseImg = 'https://kumalagroup.id/assets/img_marketing/';

    protected static $token;

    public function __construct()
    {
        self::cekToken();

        self::$token = session('apiToken');
    }

    public static function auth()
    {
        $response = Http::withBody(json_encode(['email' => 'gaza@kumalagroup.com', 'password' => 'Mobile@pisrvcs']), 'application/json')
            ->post(self::$baseUri . 'auth');
        $result = $response->json();

        if ($result['status'] === true) {
            session(['apiToken' => $result['token']]);
        }
    }

    public static function cekToken()
    {
        $token = session('apiToken');

        if ($token === null) {
            self::auth();
        }

        $response = Http::withToken($token)
            ->get(self::$baseUri . 'auth/validate');
        $result = $response->json();

        if ($result['status'] === false) {
            self::auth();
        }
    }
}
