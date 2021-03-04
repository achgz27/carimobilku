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
<section class="blog contact">
    <div class="container">
        <form class="php-email-form" id="form">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="font-weight-bold mb-3">Filter</h4>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group mb-2">
                        <select name="brand" id="brand" class="form-control select_picker" style="width: 100%">
                            <option value="">Semua Brand</option>
                            @foreach($data['brand'] as $value)
                            <option value="{{ $value['id'] }}" {{ Request::get('brand') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="input-group mb-2">
                        <input type="number" name="harga_awal" id="harga_awal" class="form-control" placeholder="Harga Awal" value="{{ Request::get('harga_awal') }}">
                        <input type="number" name="harga_akhir" id="harga_akhir" class="form-control" placeholder="Harga Akhir" value="{{ Request::get('harga_akhir') }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group mb-2">
                        <select name="transmisi" id="transmisi" class="form-control select_picker" style="width: 100%">
                            <option value="" selected>Transmisi</option>
                            @foreach($data['transmisi'] as $value)
                            <option value="{{ $value['id'] }}" {{ Request::get('transmisi') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group mb-2">
                        <select name="kilometer" id="kilometer" class="form-control select_picker" style="width: 100%">
                            <option value="">Kilometer</option>
                            <option value="10000">
                                < 10.000 Km</option>
                            <option value="50000">
                                < 50.000 Km</option>
                            <option value="100000">
                                < 100.000 Km</option>
                            <option value="150000">
                                < 150.000 Km</option>
                            <option value="200000">200.000 Km +</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 collapse" id="collapse-filter">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group mb-2">
                                <select name="lokasi" id="lokasi" class="form-control select_picker" style="width: 100%">
                                    <option value="">Semua Lokasi</option>
                                    @foreach($data['lokasi'] as $value)
                                    <option value="{{ $value['id'] }}" {{ Request::get('lokasi') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group mb-2">
                                <select name="bahan_bakar" id="bahan_bakar" class="form-control select_picker" style="width: 100%">
                                    <option value="">Bahan Bakar</option>
                                    @foreach($data['bahan_bakar'] as $value)
                                    <option value="{{ $value['id'] }}" {{ Request::get('bahan_bakar') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group mb-2">
                                <select name="tempat_duduk" id="tempat_duduk" class="form-control select_picker" style="width: 100%">
                                    <option value="" selected>Tempat Duduk</option>
                                    @foreach($data['tempat_duduk'] as $value)
                                    <option value="{{ $value['id'] }}" {{ Request::get('tempat_duduk') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group mb-2">
                                <select name="warna" id="warna" class="form-control select_picker" style="width: 100%">
                                    <option value="" selected>Semua Warna</option>
                                    @foreach($data['warna'] as $value)
                                    <option value="{{ $value['id'] }}" {{ Request::get('warna') == $value['id'] ? 'selected' : '' }}>{{ $value['text'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="input-group mb-2">
                                <input type="number" name="tahun_awal" id="tahun_awal" class="form-control" placeholder="Tahun Awal" value="{{ Request::get('tahun_awal') }}">
                                <input type="number" name="tahun_akhir" id="tahun_akhir" class="form-control" placeholder="Tahun Akhir" value="{{ Request::get('tahun_awal') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-right">
                        <a href="#collapse-filter" data-toggle="collapse" class="btn btn-outline-danger btn-sm" style="font-size: 13px;"><i class="icofont-caret-down"></i> Filter lainnya</a>
                        <a href="javascript:void(0)" id="submit" class="btn btn-danger btn-sm" style="font-size: 13px;">Submit</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section><!-- End Blog Section -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog section-bg">
    <div class="container">
        <div class="row" id="inventory-container"></div>
        <div class="text-center" id="inventory-link"></div>
    </div>
</section><!-- End Blog Section -->
@endsection

@section('script')
<script>
    let selectPicker = $('.select_picker')

    //init variable
    let form = $('#form')

    let inventoryContainer = $('#inventory-container')
    let inventoryLink = $('#inventory-link')

    $(document).ready(function() {
        selectPicker.select2()
        _showPage()
    })

    $(document).on('click', '#submit', function() {
        let url = location.search.split('&')[0] + '&' + form.serialize()
        _setUrl(url)
        _showPage()
    })

    $(document).on('click', '.page-link', function(event) {
        event.preventDefault()
        let ini = $(this)
        let url = ini.attr('href') + '&' + form.serialize()
        _setUrl(url)
        _showPage()
    })

    function _showPage(formData) {
        $.ajax({
            type: 'get',
            url: location,
            data: {
                'MODTYPE': 'main',
                'FD': location.search
            },
            dataType: 'json',
            success: function(response) {
                inventoryContainer.html(response.data.inventory)
                inventoryLink.html(response.data.links)
            }
        })
    }

    function _setUrl(url) {
        window.history.replaceState({
            id: "100"
        }, '', url)
    }
</script>
@endsection