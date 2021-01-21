@extends('app')

@php
$gambar = $baseImg.'berita/'.$data['gambar'];
$judul = Str::title($data['judul']);
$tipe = Str::ucfirst($data['type']);
$tanggal = \Carbon\Carbon::parse($data['created_at'])->format('d-m-Y');
$content = $data['deskripsi'];
@endphp

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2></h2>
            <ol>
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('promo') }}">Promo</a></li>
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

                <article class="entry entry-single" style="padding: 0;box-shadow: none;">

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
@endsection