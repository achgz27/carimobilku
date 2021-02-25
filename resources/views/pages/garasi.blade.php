@extends('app')

@section('style')
<style>
    #customCard {
        box-shadow: none;
        border: .5px solid #dee2e6;
        border-radius: .25rem;
    }

    #customCard:hover {
        border: .5px solid #e1444d;
    }
</style>
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Garasi</h2>
            <ol>
                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                <li>Garasi</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">

        <div class="row">
            @foreach($data['inventories'] as $inventory)
            @php
            $gambar = $baseImg.'uc_unit/'.$inventory['gambar'];
            $nama = Str::title($inventory['nama']);
            $harga = $inventory['harga'];
            $tanggal = \Carbon\Carbon::parse($inventory['created_at'])->format('d-m-Y');
            $tahun = $inventory['tahun'];
            $transmisi = $inventory['transmisi'];
            $kilometer = $inventory['kilometer'];
            $lokasi = $inventory['lokasi'];
            $uri = route('garasiSlug',['slug'=>$inventory['slug']]);
            @endphp

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry" id="customCard">
                
                    <div class="entry-img">
                        <img src="{{ $gambar }}" alt="" width="100%" class="img-fluid zoom_img">
                    </div>

                    <h2 class="entry-title mb-2" style="font-size: 15px;line-height: 20px;font-weight: normal;">
                        <a href="{{ $uri }}">{{ $nama }}</a>
                    </h2>
                    <h2 class="entry-title mb-3" style="color: #556270;">IDR {{ $harga }},-</h2>
                    <div class="entry-footer clearfix">
                        <div class="float-left">
                            <ul class="cats">
                                <li>
                                    <h2 class="entry-title mb-0">
                                        <a href="javascript:void(0)">{{ $tahun }}</a>
                                    </h2>
                                </li>
                            </ul>
                            <ul class="tags">
                                <li><a href="javascript:void(0)">{{ $transmisi }}</a></li>
                                <li><a href="javascript:void(0)">{{ $kilometer }}</a></li>
                                <li><a href="javascript:void(0)">{{ $lokasi }}</a></li>
                            </ul>
                        </div>
                    </div>

                </article><!-- End blog entry -->
            </div>
            @endforeach
        </div>

        <div class="text-center">
            {!! $data['links'] !!}
        </div>

    </div>
</section><!-- End Blog Section -->
@endsection