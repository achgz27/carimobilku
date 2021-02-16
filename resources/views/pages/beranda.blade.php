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
            <p>Produk terbaru</p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up">
                <div class="owl-carousel owl-theme dots-morphing">
                    @foreach($data['blogs'] as $blog)
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

                            <h2 class="entry-title mb-2" style="font-size: 15px;line-height: 20px;font-weight: normal;">
                                <a href="{{ $uri }}">{{ $judul }}</a>
                            </h2>
                            <h2 class="entry-title mb-3" style="color: #556270;">IDR 120.000.000,-</h2>
                            <div class="entry-footer clearfix">
                                <div class="float-left">
                                    <ul class="cats">
                                        <li>
                                            <h2 class="entry-title mb-0">
                                                <a href="javascript:void(0)">2018</a>
                                            </h2>
                                        </li>
                                    </ul>
                                    <ul class="tags">
                                        <li><a href="javascript:void(0)">Creative</a></li>
                                        <li><a href="javascript:void(0)">Tips</a></li>
                                    </ul>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center" style="margin-top: 20px;">
            <a href="{{ route('blog') }}" class="get-started-btn" style="margin: 0 0 1rem 0;">Lihat lainnya</a>
        </div>
    </div>
</section>

<section id="blog" class="blog">
    <div class="container">
        <div class="section-title">
            <h2>Blog</h2>
            <p>Postingan terbaru</p>
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
@endsection