<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class GarasiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->MODTYPE === 'main') {
                $uri = parent::$baseUri . 'garasi' . $request->FD;
                $response = Http::withToken(parent::$token)->get($uri);

                $data = $response->json()['data'];
                $data['links'] = str_replace(parent::$baseUri . 'garasi', route('garasi'), $data['links']);
                $baseImg = parent::$baseImg;

                $data['inventory'] = '';
                foreach ($data['inventories'] as $inventory) {
                    $gambar = $baseImg . 'uc_unit/' . $inventory['gambar'];
                    $nama = Str::title($inventory['nama']);
                    $harga = number_format($inventory['harga'], 0, ',', '.');
                    $tanggal = \Carbon\Carbon::parse($inventory['created_at'])->format('d-m-Y');
                    $tahun = $inventory['tahun'];
                    $transmisi = $inventory['transmisi'];
                    $kilometer = number_format($inventory['kilometer'], 0, ',', '.');
                    $lokasi = $inventory['lokasi'];
                    $uri = route('garasiSlug', ['slug' => $inventory['slug']]);

                    $data['inventory'] .= '<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry" id="customCard">
                            <div class="entry-img">
                                <img src="' . $gambar . '" alt="" width="100%" class="img-fluid zoom_img">
                            </div>

                            <h2 class="entry-title mb-2" style="font-size: 15px;line-height: 20px;font-weight: normal;">
                                <a href="' . $uri . '">' . $nama . '</a>
                            </h2>
                            <h2 class="entry-title mb-3" style="color: #556270;">IDR ' . $harga . ',-</h2>
                            <div class="entry-footer clearfix">
                                <div class="float-left">
                                    <ul class="cats">
                                        <li>
                                            <h2 class="entry-title mb-0">
                                                <a href="javascript:void(0)">' . $tahun . '</a>
                                            </h2>
                                        </li>
                                    </ul>
                                    <ul class="tags">
                                        <li><a href="javascript:void(0)">' . $transmisi . '</a></li>
                                        <li><a href="javascript:void(0)">' . $kilometer . ' Km</a></li>
                                        <li><a href="javascript:void(0)">' . $lokasi . '</a></li>
                                    </ul>
                                </div>
                            </div>
                        </article><!-- End blog entry -->
                    </div>';
                }

                unset($data['inventories']);

                return response()->json([
                    'status' => true,
                    'data' => $data
                ]);
            }
        }

        $uri = parent::$baseUri . 'garasi?getfilter=';
        $response = Http::withToken(parent::$token)->get($uri);

        $data = $response->json()['data'];

        $index = 'garasi';
        return view('pages.garasi', compact('data', 'index'));
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
