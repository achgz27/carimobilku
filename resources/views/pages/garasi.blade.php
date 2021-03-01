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
<section class="contact">
    <div class="container">
        <form class="php-email-form" id="form">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="font-weight-bold mb-3">Filter</h4>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group mb-2">
                        <select name="brand" id="brand" class="form-control">
                            <option value="" selected>Brand</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="input-group mb-2">
                        <input type="text" name="harga_awal" id="harga_awal" class="form-control" placeholder="Harga Awal">
                        <input type="text" name="harga_akhir" id="harga_akhir" class="form-control" placeholder="Harga Akhir">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group mb-2">
                        <select name="transmisi" id="transmisi" class="form-control">
                            <option value="" selected>Transmisi</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group mb-2">
                        <select name="kilometer" id="kilometer" class="form-control">
                            <option value="" selected>Kilometer</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 collapse" id="collapse-filter">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group mb-2">
                                <select name="lokasi" id="lokasi" class="form-control">
                                    <option value="" selected>Lokasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group mb-2">
                                <select name="bahan_bakar" id="bahan_bakar" class="form-control">
                                    <option value="" selected>Bahan Bakar</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group mb-2">
                                <select name="tempat_duduk" id="tempat_duduk" class="form-control">
                                    <option value="" selected>Tempat Duduk</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group mb-2">
                                <select name="warna" id="warna" class="form-control">
                                    <option value="" selected>Warna</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="input-group mb-2">
                                <input type="text" name="tahun_awal" id="tahun_awal" class="form-control" placeholder="Tahun Awal">
                                <input type="text" name="tahun_akhir" id="tahun_akhir" class="form-control" placeholder="Tahun Akhir">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-right">
                        <a href="#collapse-filter" data-toggle="collapse" class="btn btn-danger btn-sm" style="font-size: 13px;"><i class="icofont-caret-down"></i> Filter lainnya</a>
                        <a href="{{ route('garasi') }}" class="btn btn-outline-danger btn-sm" style="font-size: 13px;">Reset</a>
                        <a href="javascript:void(0)" id="submit" class="btn btn-outline-danger btn-sm" style="font-size: 13px;">Submit</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><!-- End Blog Section -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog section-bg">
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

@section('script')
<script>

</script>
@endsection