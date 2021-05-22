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

    .outer { margin:0 auto; max-width:800px;}
    #big .item { background: #ffffff; padding: 9px 0px; margin:2px; color: #FFF; border-radius: 3px; text-align: center; }
    #thumbs .item { background: #C9C9C9; height:70px; line-height:70px; padding: 0px; margin:2px; color: #FFF; border-radius: 3px; text-align: center; cursor: pointer; }
    #thumbs .item h1 { font-size: 16px; }
    #thumbs .current .item { background:#ffffff; }
    .owl-theme .owl-nav [class*='owl-'] { -webkit-transition: all .3s ease; transition: all .3s ease; }
    .owl-theme .owl-nav [class*='owl-'].disabled:hover { background-color: #D6D6D6; }
    #big.owl-theme { position: relative; }
    #big.owl-theme .owl-next, #big.owl-theme .owl-prev { background:#333; width: 22px; line-height:40px; height: 40px; margin-top: -20px; position: absolute; text-align:center; top: 50%; }
    #big.owl-theme .owl-prev { left: 10px; }
    #big.owl-theme .owl-next { right: 10px; }
    #thumbs.owl-theme .owl-next, #thumbs.owl-theme .owl-prev { background:#333; }
</style>
@endsection

@section('content')

@php
$nama = Str::title($data['inventory']['nama']);
$content = $data['inventory']['deskripsi'];
$harga = number_format($data['inventory']['harga'],0,',','.');
$tahun = $data['inventory']['tahun'];
$transmisi = $data['inventory']['transmisi'];
$kilometer = number_format($data['inventory']['kilometer'],0,',','.');;
$lokasi = $data['inventory']['lokasi'];

$brand = $data['inventory']['brand'];
$bahanBakar = $data['inventory']['bahan_bakar'];
$tempatDuduk = $data['inventory']['tempat_duduk'];
$warna = $data['inventory']['warna'];
$video = $data['inventory']['video'];
@endphp



<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs" style="margin-top: 0;">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2></h2>
            <ol>
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('garasi', ['page' => 1]) }}">Garasi</a></li>
                <li>{{ $nama }}</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->



<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">

        <div class="row">
            <div class="col-md-8 entries">

                <article class="entry entry-single" style="padding: 0;margin-bottom: 0;box-shadow: none;">
                    <h2 class="entry-title"><a href="javascript:void(0)">{{ $nama }}</a></h2>
                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><a href="javascript:void(0)" class="font-weight-bold" style="font-size: 20px;">{{ $tahun }}</a></li>
                            <li class="d-flex align-items-center"><i class="icofont-automation"></i> <a href="javascript:void(0)">{{ $transmisi }}</a></li>
                            <li class="d-flex align-items-center"><i class="icofont-dashboard"></i> <a href="javascript:void(0)">{{ $kilometer }} Km</a></li>
                            <li class="d-flex align-items-center"><i class="icofont-location-pin"></i> <a href="javascript:void(0)">{{ $lokasi }}</a></li>
                        </ul>
                    </div>
                    <h3 class="font-weight-bold text-danger d-block d-md-none mb-3">IDR {{ $harga }},-</h3>
                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->
            <div class="col-md-4 entries my-auto">
                <h3 class="font-weight-bold text-right text-danger d-none d-md-block mb-0">IDR {{ $harga }},-</h3>
            </div><!-- End blog entries list -->
            <div class="col-lg-8 entries">

                <article class="entry entry-single" style="padding: 0;margin-bottom: 0;box-shadow: none;">

                    <div class="card mt-4 mb-3 d-md-block d-lg-none">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table style="width: 100%; font-size: 15px;">
                                        <tbody>
                                            <tr>
                                                <td>Brand</td>
                                                <td>:</td>
                                                <td>{{ $brand }}</td>
                                            </tr>
                                            <tr>
                                                <td>Transmisi</td>
                                                <td>:</td>
                                                <td>{{ $transmisi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tahun</td>
                                                <td>:</td>
                                                <td>{{ $tahun }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kilometer</td>
                                                <td>:</td>
                                                <td>{{ $kilometer }} Km</td>
                                            </tr>
                                            <tr>
                                                <td>Bahan Bakar</td>
                                                <td>:</td>
                                                <td>{{ $bahanBakar }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Duduk</td>
                                                <td>:</td>
                                                <td>{{ $tempatDuduk }}</td>
                                            </tr>
                                            <tr>
                                                <td>Warna</td>
                                                <td>:</td>
                                                <td>{{ $warna }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td>:</td>
                                                <td>{{ $lokasi }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 d-none d-md-block">
                                    <div class="text-center">
                                        <a href="https://wa.me/6281212100700" class="btn btn-outline-danger btn-block btn-lg" style="margin: 1rem 0 1rem 0; font-size: 1rem;">
                                            <i class="icofont-whatsapp"></i> 081212 100 700</a>
                                        <a href="{{ route('hubungi') }}" class="btn btn-danger btn-block btn-lg" style="margin: 1rem 0 1rem 0; font-size: 1rem;">Hubungi Kami</a>
                                    </div>
                                    <div class="entry-footer">
                                        <div class="text-center share">
                                            <a href="" title="Share on Facebook" class="facebook"><i class="icofont-facebook"></i></a>
                                            <a href="" title="Share on Instagram" class="instagram"><i class="icofont-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer d-md-none d-sm-block">
                            <div class="text-center">
                                <a href="https://wa.me/6281212100700" class="btn btn-outline-danger btn-block btn-lg" style="margin: 1rem 0 1rem 0; font-size: 1rem;">
                                    <i class="icofont-whatsapp"></i> 081212 100 700</a>
                                <a href="{{ route('hubungi') }}" class="btn btn-danger btn-block btn-lg" style="margin: 1rem 0 1rem 0; font-size: 1rem;">Hubungi Kami</a>
                            </div>
                            <div class="entry-footer">
                                <div class="text-center share">
                                    <a href="" title="Share on Facebook" class="facebook"><i class="icofont-facebook"></i></a>
                                    <a href="" title="Share on Instagram" class="instagram"><i class="icofont-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- slide --}}
                    <div class="outer">
                        <div id="big" class="owl-carousel owl-theme">
                            @foreach($data['inventory']['to_galeri'] as $slider)
                            @php
                                $gambar = $baseImg.'uc_unit/galeri/'.$slider['img'];
                            @endphp
                            <div class="item">
                                <img src="{{ $gambar }}" alt="" width="100%">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel owl-theme">
                            @foreach($data['inventory']['to_galeri'] as $slider)
                            @php
                                $gambar = $baseImg.'uc_unit/galeri/'.$slider['img'];
                            @endphp
                            <div class="item">
                                <img src="{{ $gambar }}" alt="" width="100%">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- end slide --}}

                    <h4 class="font-weight-bold mt-4 mb-3">Deskripsi</h4>
                    <div class="entry-content">
                        {!! $content !!}
                    </div>

                    <h4 class="font-weight-bold mt-4 mb-3">Video</h4>
                    <div class="entry-content embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $video }}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>


                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->

            <div class="col-lg-4 d-none d-lg-block mt-4 mb-3">

                <div class="card">
                    <div class="card-body">
                        <table style="width: 100%; font-size: 15px;">
                            <tbody>
                                <tr>
                                    <td>Brand</td>
                                    <td>:</td>
                                    <td>{{ $brand }}</td>
                                </tr>
                                <tr>
                                    <td>Transmisi</td>
                                    <td>:</td>
                                    <td>{{ $transmisi }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>:</td>
                                    <td>{{ $tahun }}</td>
                                </tr>
                                <tr>
                                    <td>Kilometer</td>
                                    <td>:</td>
                                    <td>{{ $kilometer }} Km</td>
                                </tr>
                                <tr>
                                    <td>Bahan Bakar</td>
                                    <td>:</td>
                                    <td>{{ $bahanBakar }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Duduk</td>
                                    <td>:</td>
                                    <td>{{ $tempatDuduk }}</td>
                                </tr>
                                <tr>
                                    <td>Warna</td>
                                    <td>:</td>
                                    <td>{{ $warna }}</td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>:</td>
                                    <td>{{ $lokasi }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="https://wa.me/6281212100700" class="btn btn-outline-danger btn-block btn-lg" style="margin: 1rem 0 1rem 0; font-size: 1rem;">
                                <i class="icofont-whatsapp"></i> 081212 100 700</a>
                            <a href="{{ route('hubungi') }}" class="btn btn-danger btn-block btn-lg" style="margin: 1rem 0 1rem 0; font-size: 1rem;">Hubungi Kami</a>
                        </div>
                        <div class="entry-footer">
                            <div class="text-center share">
                                <a href="" title="Share on Facebook" class="facebook"><i class="icofont-facebook"></i></a>
                                <a href="" title="Share on Instagram" class="instagram"><i class="icofont-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- End blog entries list -->

        </div>

    </div>
</section><!-- End Blog Section -->

<section id="related" class="blog">
    <div class="container">
        <div class="section-title">
            <h2>Garasi</h2>
            <p style="font-size: 30px;">Produk terkait</p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up">
                <div id="products" class="owl-carousel owl-theme dots-morphing">
                    @foreach($data['related'] as $inventory)
                    @php
                    $gambar = $baseImg.'uc_unit/'.$inventory['gambar'];
                    $nama = Str::title($inventory['nama']);
                    $harga = number_format($inventory['harga'],0,',','.');
                    $tahun = $inventory['tahun'];
                    $transmisi = $inventory['transmisi'];
                    $kilometer = number_format($inventory['kilometer'],0,',','.');
                    $lokasi = $inventory['lokasi'];
                    $uri = route('garasiSlug',['slug'=>$inventory['slug']]);
                    @endphp
                    <div class="item">
                        <article class="entry" id="customCard" style="margin-bottom: 20px;">
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
    </div>
</section>
@endsection

@section('script')
<script>

    $('#products').owlCarousel({
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
    $(document).ready(function() {
  var bigimage = $("#big");
  var thumbs = $("#thumbs");
  //var totalslides = 10;
  var syncedSecondary = true;

  bigimage
    .owlCarousel({
    items: 1,
    slideSpeed: 4000,
    nav: true,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    autoHeight: true,
    dots: false,
    loop: true,
    responsiveRefreshRate: 200,
    navText: [
      '<i class="icofont-simple-left" aria-hidden="true"></i>',
      '<i class="icofont-simple-right" aria-hidden="true"></i>'
    ]
  })
    .on("changed.owl.carousel", syncPosition);

  thumbs
    .on("initialized.owl.carousel", function() {
    thumbs
      .find(".owl-item")
      .eq(0)
      .addClass("current");
  })
    .owlCarousel({
    items: 4,
    dots: false,
    nav: false,
    navText: [
      '<i class="icofont-simple-left" aria-hidden="true"></i>',
      '<i class="icofont-simple-right" aria-hidden="true"></i>'
    ],
    smartSpeed: 100,
    slideSpeed: 300,
    slideBy: 4,
    responsiveRefreshRate: 100
  })
    .on("changed.owl.carousel", syncPosition2);

  function syncPosition(el) {
    //if loop is set to false, then you have to uncomment the next line
    //var current = el.item.index;

    //to disable loop, comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

    if (current < 0) {
      current = count;
    }
    if (current > count) {
      current = 0;
    }
    //to this
    thumbs
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = thumbs.find(".owl-item.active").length - 1;
    var start = thumbs
    .find(".owl-item.active")
    .first()
    .index();
    var end = thumbs
    .find(".owl-item.active")
    .last()
    .index();

    if (current > end) {
      thumbs.data("owl.carousel").to(current, 100, true);
    }
    if (current < start) {
      thumbs.data("owl.carousel").to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if (syncedSecondary) {
      var number = el.item.index;
      bigimage.data("owl.carousel").to(number, 100, true);
    }
  }

  thumbs.on("click", ".owl-item", function(e) {
    e.preventDefault();
    var number = $(this).index();
    bigimage.data("owl.carousel").to(number, 300, true);
  });
});
</script>
@endsection