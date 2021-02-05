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
            <h2>Blog</h2>
            <ol>
                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                <li>Blog</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
    <div class="container">

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
            {!! $data['links'] !!}
        </div>

    </div>
</section><!-- End Blog Section -->
@endsection