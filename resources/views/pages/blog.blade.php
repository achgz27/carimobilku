@extends('app')

@section('style')
<style>
    .pagination {
        display: inline-flex;
    }

    li.page-item.active .page-link {
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

            @empty($blog['thumb'])
            @php $gambar = $baseImg.'berita/'.$blog['gambar']; @endphp
            @else
            @php $gambar = $baseImg.'berita/thumb/'.$blog['thumb']; @endphp
            @endempty

            @php
            $judul = Str::title($blog['judul']);
            $tipe = Str::ucfirst($blog['type']);
            $tanggal = \Carbon\Carbon::parse($blog['updated_at'])->format('d-m-Y');
            $content = Str::limit(strip_tags($blog['deskripsi']),200);
            @endphp

            <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                <article class="entry">

                    <div class="entry-img">
                        <img src="{{ $gambar }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="blog-single.html">{{ $judul }}</a>
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
                            <a href="blog-single.html">Selengkapnya</a>
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