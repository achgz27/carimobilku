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

            <div class="col-lg-4">
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

            <div class="col-lg-8 mt-5 mt-lg-0">

                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                </form>

            </div>

        </div>

    </div>
</section><!-- End Contact Section -->
@endsection