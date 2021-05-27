@extends('app')

@section('style')
<style>
    #customCarousel .owl-dots {
        position: absolute;
        bottom: 0;
        padding-bottom: 20px;
        width: 100%;
    }

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
<!-- ======= Hero Section ======= -->
<section id="customCarousel" style="padding: 65px 0 40px 0;">
    <div class="owl-carousel owl-theme dots-morphing">
        @foreach($data['sliders'] as $slider)
        @php
        $gambar = $baseImg.'slider/'.$slider['gambar'];
        $uri = $slider['aksi'];
        @endphp
        <div class="item">
            <a href="{{ $uri }}" target="_blank">
                <img src="{{ $gambar }}" alt="" width="100%" class="img-fluid">
            </a>
        </div>
        @endforeach
    </div>
</section><!-- End Hero -->

<section id="garasi" class="blog">
    <div class="container">
        <div class="section-title">
            <h2>Garasi</h2>
            <p style="font-size: 30px;">Produk terbaru</p>

            <form class="php-email-form" id="form">
                <div class="row">
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group mb-2">
                            <select name="brand" id="brand" class="form-control select_picker" style="width: 100%">
                                <option value="">Semua Brand</option>
                                @foreach($filter['brand'] as $value)
                                    <option value="{{ $value['id'] }}" {{ Request::get('brand') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="input-group mb-2">
                            <input type="number" name="harga_awal" id="harga_awal" class="form-control" placeholder="Harga Awal" value="{{ Request::get('harga_awal') }}">
                            <input type="number" name="harga_akhir" id="harga_akhir" class="form-control" placeholder="Harga Akhir" value="{{ Request::get('harga_akhir') }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group mb-2">
                            <select name="transmisi" id="transmisi" class="form-control select_picker" style="width: 100%">
                                <option value="" selected>Transmisi</option>
                                @foreach($filter['transmisi'] as $value)
                                <option value="{{ $value['id'] }}" {{ Request::get('transmisi') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group mb-2">
                            <select name="kilometer" id="kilometer" class="form-control select_picker" style="width: 100%">
                                <option value="">Kilometer</option>
                                <option value="10000" {{Request::get('kilometer') == 10000 ? 'selected' : ''}}>
                                    < 10.000 Km</option>
                                <option value="50000" {{Request::get('kilometer') == 50000 ? 'selected' : ''}}>
                                    < 50.000 Km</option>
                                <option value="100000" {{Request::get('kilometer') == 100000 ? 'selected' : ''}}>
                                    < 100.000 Km</option>
                                <option value="150000" {{Request::get('kilometer') == 150000 ? 'selected' : ''}}>
                                    < 150.000 Km</option>
                                <option value="200000" {{Request::get('kilometer') == 200000 ? 'selected' : ''}}>200.000 Km +</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 collapse" id="collapse-filter">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-2">
                                    <select name="lokasi" id="lokasi" class="form-control select_picker" style="width: 100%">
                                        <option value="">Semua Lokasi</option>
                                        @foreach($filter['lokasi'] as $value)
                                            <option value="{{ $value['id'] }}" {{ Request::get('lokasi') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-2">
                                    <select name="bahan_bakar" id="bahan_bakar" class="form-control select_picker" style="width: 100%">
                                        <option value="">Bahan Bakar</option>
                                        @foreach($filter['bahan_bakar'] as $value)
                                            <option value="{{ $value['id'] }}" {{ Request::get('bahan_bakar') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-2">
                                    <select name="tempat_duduk" id="tempat_duduk" class="form-control select_picker" style="width: 100%">
                                        <option value="" selected>Tempat Duduk</option>
                                        @foreach($filter['tempat_duduk'] as $value)
                                            <option value="{{ $value['id'] }}" {{ Request::get('tempat_duduk') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group mb-2">
                                    <select name="warna" id="warna" class="form-control select_picker" style="width: 100%">
                                        <option value="" selected>Semua Warna</option>
                                        @foreach($filter['warna'] as $value)
                                            <option value="{{ $value['id'] }}" {{ Request::get('warna') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="input-group mb-2">
                                    <input type="number" name="tahun_awal" id="tahun_awal" class="form-control" placeholder="Tahun Awal" value="{{ Request::get('tahun_awal') }}">
                                    <input type="number" name="tahun_akhir" id="tahun_akhir" class="form-control" placeholder="Tahun Akhir" value="{{ Request::get('tahun_awal') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="text-right">
                            <a href="#collapse-filter" data-toggle="collapse" class="btn btn-outline-danger btn-sm" style="font-size: 13px;"><i class="icofont-caret-down"></i> Filter lainnya</a>
                            <a href="javascript:void(0)" id="submit" class="btn btn-danger btn-sm" style="font-size: 13px;">Submit</a>
                        </div>
                    </div>
                </div>
            </form>
        </div> 

        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up">
                <div class="owl-carousel owl-theme dots-morphing">
                    @foreach($data['inventories'] as $inventory)
                    @php
                    $gambar = $baseImg.'uc_unit/'.$inventory['gambar'];
                    $nama = Str::title($inventory['nama']);
                    $harga = number_format($inventory['harga'], 0, ',', '.');
                    $tahun = $inventory['tahun'];
                    $transmisi = $inventory['transmisi'];
                    $kilometer = number_format($inventory['kilometer'], 0, ',', '.');;
                    $lokasi = $inventory['lokasi'];
                    $uri = route('garasiSlug',['slug'=>$inventory['slug']]);
                    @endphp
                    <div class="item">
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
                                        <li><a href="javascript:void(0)">{{ $kilometer }} Km</a></li>
                                        <li><a href="javascript:void(0)">{{ $lokasi }}</a></li>
                                    </ul>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('garasi', ['page' => 1]) }}" class="get-started-btn" style="margin: 0 0 1rem 0;">Lihat lainnya</a>
        </div>
    </div>
</section>

<section id="blog" class="blog section-bg">
    <div class="container">
        <div class="section-title">
            <h2>Blog</h2>
            <p style="font-size: 30px;">Postingan terbaru</p>
        </div>

        <div class="row">
            @foreach($data['blogs'] as $blog)
            @php
            $gambar = $baseImg.'berita/'.(empty($blog['thumb'])?$blog['gambar']:'thumb/'.$blog['thumb']);
            $judul = Str::title($blog['judul']);
            $tipe = Str::ucfirst($blog['type']);
            $tanggal = \Carbon\Carbon::parse($blog['created_at'])->format('d-m-Y');
            $content = Str::limit(strip_tags($blog['deskripsi']),200);
            $uri = route('blogSlug',['slug'=>$blog['slug']]);
            @endphp

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry" id="customCard">

                    <div class="entry-img">
                        <img src="{{ $gambar }}" alt="" width="100%" class="img-fluid zoom_img">
                    </div>

                    <h3 class="entry-title">
                        <a href="{{ $uri }}">{{ $judul }}</a>
                    </h3>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-folder"></i> <a href="javascript:void(0)">{{ $tipe }}</a></li>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="javascript:void(0)">{{ $tanggal }}</a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                            {{ $content }}
                        </p>
                        <div class="read-more">
                            <a href="{{ $uri }}">Baca selengkapnya</a>
                        </div>
                    </div>

                </article><!-- End blog entry -->
            </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('blog') }}" class="get-started-btn" style="margin: 0 0 1rem 0;">Lihat lainnya</a>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $('#customCarousel .owl-carousel').owlCarousel({
        loop: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoHeight: true,
        items: 1
    })

    $('#garasi .owl-carousel').owlCarousel({
        margin: 30,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })
</script>
<script>
    let selectPicker = $('.select_picker')
    let form = $('#form')
 
    $(document).on('click', '#submit', function() {
        
        let url = new URL(location.href.split('garasi?') [0] + 'garasi?page=1&' + form.serialize())
        let params = new URLSearchParams(url.search).toString()

        _showPage(params)
    })

    function _showPage(params) {
        $.ajax({
            type: 'get',
            url: 'garasi',
            data: {
                'MODTYPE': 'main',
                'FD': params
            },
            dataType: 'json',
            success: function(response) {
                window.open('garasi'+response.data.uri);
            }
        })
    }
</script>
@endsection