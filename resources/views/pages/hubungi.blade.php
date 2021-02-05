@extends('app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Hubungi Kami</h2>
            <ol>
                <li><a href="{{ route('beranda') }}">Beranda</a></li>
                <li>Hubungi Kami</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d569.0149654675052!2d119.43470674771686!3d-5.166640146154038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee33d314e73f5%3A0xbc1714d3938531f6!2sRuko%20PETTARANI%20BUSINESS%20CENTRE!5e0!3m2!1sid!2sid!4v1610335856443!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

            <div class="col-md-6 col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Alamat:</h4>
                        <p>Pettarani Business Center Jl. A. P. Pettarani Kav E 18 No E10, Tidung, Kec. Rappocini, Kota Makassar, Sulawesi Selatan</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Telepon:</h4>
                        <p>(0411) 4672 888</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-whatsapp"></i>
                        <h4>Whatsapp:</h4>
                        <p>081212 100 700</p>
                    </div>

                </div>

            </div>

            <div class="col-md-6 col-lg-8 mt-5 mt-md-0">

                <form class="php-email-form" id="form">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama lengkap" maxlength="100" data-msg-required="Silahkan masukkan nama anda" required>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-msg-email="Email anda tidak valid" data-msg-required="Silahkan masukkan email anda" required>
                        </div>
                        <div class="col-lg-6 form-group">
                            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No. telepon" onkeydown="input_number(event)" data-msg-required="Silahkan masukkan no. telepon anda" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="pesan" id="pesan" rows="3" data-msg-required="Silahkan masukkan pesan anda untuk kami" placeholder="Pesan" required></textarea>
                    </div>
                    <div class="text-center"><button type="submit" id="submit">Kirim pesan</button></div>
                </form>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
    $('#submit').on('click', function(event) {
        event.preventDefault()

        let ini = $('#submit')
        let form = $('#form')

        if (form.valid()) {
            let data = form.serializeArray()

            $.ajax({
                type: 'post',
                url: location,
                data: {
                    _submit: true,
                    _token: '{{ csrf_token() }}',
                    ...data
                },
                dataType: 'json',
                beforeSend: function() {
                    ini.prop('disabled', true)
                    ini.html('Mengirimkan pesan...')
                },
                success: function(response) {
                    ini.prop('disabled', false)
                    ini.html('Kirim pesan')

                    if (response.status === true) {
                        form.trigger('reset')
                        alert('Terima kasih, wiraniaga kami akan segera menghubungi anda')
                        return false
                    }

                    alert(response.msg)
                }
            });
        }
    })
</script>
@endsection