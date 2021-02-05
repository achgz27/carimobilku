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

@php
$gambar = $baseImg.'berita/'.$data['blog']['gambar'];
$judul = Str::title($data['blog']['judul']);
$tipe = Str::ucfirst($data['blog']['type']);
$tanggal = \Carbon\Carbon::parse($data['blog']['created_at'])->format('d-m-Y');
$content = $data['blog']['deskripsi'];
@endphp

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2></h2>
            <ol>
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li>{{ $judul }}</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">

        <div class="row">

            <div class="col-lg-12 entries">

                <article class="entry entry-single" style="padding: 0;margin-bottom: 0;box-shadow: none;">

                    <div class="entry-img">
                        <img src="{{ $gambar }}" alt="" width="100%" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="javascript:void(0)">{{ $judul }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="javascript:void(0)">Admin</a></li>
                            <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="javascript:void(0)">{{ $tanggal }}</a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        {!! $content !!}
                    </div>

                    <div class="entry-footer clearfix">
                        <div class="float-left">
                            <i class="icofont-folder"></i>
                            <ul class="cats">
                                <li><a href="javascript:void(0)">{{ $tipe }}</a></li>
                            </ul>
                        </div>

                        <div class="float-right share">
                            <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                            <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                            <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                        </div>

                    </div>

                </article><!-- End blog entry -->

            </div><!-- End blog entries list -->

        </div>

    </div>
</section><!-- End Blog Section -->

<section class="blog">
    <div class="container">
        <div class="section-title">
            <h2>Blog</h2>
            <p>Postingan terbaru</p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up">
                <div class="owl-carousel owl-theme dots-morphing">
                    @foreach($data['related'] as $blog)
                    @php
                    $gambar = $baseImg.'berita/'.(empty($blog['thumb'])?$blog['gambar']:'thumb/'.$blog['thumb']);
                    $judul = Str::title($blog['judul']);
                    $tipe = Str::ucfirst($blog['type']);
                    $tanggal = \Carbon\Carbon::parse($blog['created_at'])->format('d-m-Y');
                    $content = Str::limit(strip_tags($blog['deskripsi']),200);
                    $uri = route('blogSlug',['slug'=>$blog['slug']]);
                    @endphp
                    <div class="item">
                        <article class="entry" id="customCard" style="margin-bottom: 20px;">
                            <div class="entry-img">
                                <img src="{{ $gambar }}" alt="" width="100%" class="img-fluid zoom_img">
                            </div>

                            <h2 class="entry-title">
                                <a href="{{ $uri }}">{{ $judul }}</a>
                            </h2>

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
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
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
@endsection