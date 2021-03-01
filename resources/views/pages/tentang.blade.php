@extends('app')
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Tentang Kami</h2>
            <ol>
                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                <li>Tentang Kami</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<section id="about" class="blog about">
    <div class="container">

        <div class="row content">
            <div class="col-md-4 col-lg-3">
                <div class="logo mb-4">
                    <img src="{{ asset('assets/gambar/logo.png') }}" alt="" width="100%" class="img-fluid">
                </div>
            </div>
            <div class="col-md-8 col-lg-9 pt-4 pt-lg-0">
                <p>
                    <strong>Carimobilku</strong> (PT. Kumala Sukses Cemerlang) merupakan Platform Jual Beli Mobil Bekas, sebagai bagian dari Layanan Kumala Group untuk mempermudah pelanggan dalam memiliki mobil impian. yang beralamat di Pettarani Business Center, JL. A. P. Pettarani Kav E18 No E10, Kota Makassar.
                </p>
                <p class="font-italic">
                    Memiliki area layanan yang tersebar di Sulawesi, Maluku dan Bali yang memberikan penawaran terbaik dan layanan terlengkap. Menawarkan mobil terpilih dalam kondisi terbaik dengan informasi paling rinci adalah prioritas utama.
                </p>
            </div>
        </div>

    </div>
</section><!-- End About Section -->
@endsection