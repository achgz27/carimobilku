<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <a href="{{ route('beranda') }}" class="logo">
            <img src="{{ asset('assets/gambar/logo.png') }}" alt="" class="img-fluid">
        </a>

        <nav class="nav-menu d-none d-lg-block ml-auto">

            <ul>
                <li class="{{ $index=='beranda'?'active':'' }}"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="{{ $index=='tentang'?'active':'' }}"><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                <li class="{{ $index=='produk'?'active':'' }}"><a href="{{ route('beranda') }}">Garasi</a></li>
                <li class="{{ $index=='blog'?'active':'' }}"><a href="{{ route('blog') }}">Blog</a></li>
                <li class="{{ $index=='promo'?'active':'' }}"><a href="{{ route('promo') }}">Promo</a></li>
                <li class="{{ $index=='hubungi'?'active':'' }}"><a href="{{ route('hubungi') }}">Hubungi Kami</a></li>

            </ul>

        </nav><!-- .nav-menu -->
    </div>
</header><!-- End Header -->