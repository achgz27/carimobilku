@extends('app')

@section('style')
<style>
    .pagination {
        display: inline-flex;
    }

    .page-item.active .page-link {
        background-color: #e1444d;
        border-color: #e1444d;
    }

    .page-link {
        color: #556270;
    }

    .page-link:hover {
        color: #e1444d;
    }
</style>
@endsection

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Promo</h2>
            <ol>
                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                <li>Promo</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">

        <div class="row">

            @foreach($data['promos'] as $promo)
            @php
            $gambar = $baseImg.'berita/'.(empty($promo['thumb'])?$promo['gambar']:'thumb/'.$promo['thumb']);
            $judul = Str::title($promo['judul']);
            $tipe = Str::ucfirst($promo['type']);
            $tanggal = \Carbon\Carbon::parse($promo['updated_at'])->format('d-m-Y');
            $content = Str::limit(strip_tags($promo['deskripsi']),200);
            @endphp
            <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry" style="padding: 0 20px 0 0;">

                    <div class="row">
                        <div class="col-lg-4 entry" style="padding: 0;margin-bottom: 0;box-shadow: none;">
                            <div class="entry-img" style="margin-bottom: 0;">
                                <img src="{{ $gambar }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-8 entry" style="margin-bottom: 0;box-shadow: none;">
                            <h2 class="entry-title">
                                <a href="blog-single.html">{{ $judul }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="icofont-folder"></i> <a href="blog-single.html">{{ $tipe }}</a></li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html">{{ $tanggal }}</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {{ $content }}
                                </p>
                                <div class="read-more">
                                    <a href="blog-single.html">Selengkapnya</a>
                                </div>
                            </div>
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