<!doctype html>
<html lang="en">
  <head>
    <link rel="icon" type="image/ico" sizes="16x16" href="{{ asset('images/logo-08.ico') }}">
    <title>Me &mdash; Walimah</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assetsMe/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsMe/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsMe/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsMe/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsMe/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsMe/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsMe/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsMe/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsMe/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsMe/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assetsMe/css/style.css') }}">

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">



  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    @include('user.includeUser.headerUser')


<div class="site-blocks-cover overlay bg-light" id="home-section">

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-12 mt-lg-5 text-left align-self-center text-intro">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="text-black">Jasa Design Undangan Pernikahan</h1>
              <p class="lead">Segera pesan untuk kami buatkan Undangan Pernikahanmu</p>
              <p><a href="#portfolio-section" class="btn smoothscroll btn-primary">Sample Products</a></p>

            </div>
          </div>
        </div>

      </div>
    </div>
    @foreach ($home as $rumah)
    <img src="{{ Storage::url($rumah->img_title) }}" alt="Image" class="img-face" data-aos="fade">
    @endforeach


  </div>



<div class="site-section" id="products-section">
    <div class="container">
      <div class="row ">
        <div class="col-12 mb-5 position-relative">
          <h2 class="section-title text-center mb-5">My Categories</h2>
        </div>

        @foreach ($category as $kategori)
        <div class="col-md-6 mb-4">
          <div class="service d-flex h-100">
            <div class="service-number mr-4"><span class="icon-layers"></span></div>
            <div class="service-about">
              <h3>{{ $kategori->nm_category }}</h3>
              <p>{{ $kategori->desc }}</p>
                {{-- <button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#show-{{ $loop->iteration }}">
                    <i class="mdi mdi-file"></i>
                    More
                </button> --}}
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>


    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row ">
          <div class="col-12 mb-4 position-relative">
            <h2 class="section-title">About Me</h2>
          </div>

          @foreach ($about as $abouts)
          <div class="col-lg-4 order-1 order-lg-2 mb-4 mb-lg-0">
            <div class="bg-light pt-0">
            <img src="{{ Storage::url($abouts->foto_ab) }}" alt="Image" class="img-fluid">
            </div>
          </div>
          <div class="col-lg-8 order-3 order-lg-3">
            {!! $abouts->deskripsi_ab == '' ? 'N/A' : $abouts->deskripsi_ab !!}
            <p><a href="#contact-section" class="btn smoothscroll btn-primary">Contact Me</a></p>
          </div>
          @endforeach

        </div>
      </div>
    </div>




    <section class="site-section block__62272" id="portfolio-section">


      <div class="container">
        <div class="row mb-5">
          <div class="col-12 position-relative">
            <h2 class="section-title text-center mb-5">My Products</h2>
          </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12 mb-5 position-relative">
                    <div class="service d-flex h-100">
                        <a href="/" class="btn btn-primary">all</a>
                        @foreach ($category as $item)
                            <a href="/category/{{ $item->id }}" class="btn btn-primary">{{ $item->nm_category }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div id="posts" class="row no-gutter">

        @foreach ($foto as $product)
            <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4" style="margin-top: 20px">
            <a href="{{ Storage::url($product->foto) }}" class="item-wrap fancybox">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="{{ Storage::url($product->foto) }}">
              <p>{{ $product->nama }}</p>
              <p>Rp. {{ number_format($product->harga, 2, ',', '.') }}</p>
            </a>
            </div>
        @endforeach


        </div>
      </div>

    </section>


    <section class="site-section bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-5 position-relative">
            <h2 class="section-title text-center mb-5 text-white">testimonials</h2>
          </div>
        </div>

        <div class="owl-carousel slide-one-item">
            @foreach ($testimoni as $testimonial)
          <div class="slide">
            <blockquote>
              <p>{{ $testimonial->testimoni }}</p>
              <p><cite>&mdash; {{ $testimonial->nm_tester }}</cite></p>
            </blockquote>
          </div>
          @endforeach
        </div>

      </div>
    </section>

    <section class="site-section" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-5 position-relative">
            <h2 class="section-title text-center mb-5">Contact Form</h2>
          </div>
        </div>


        <form action="{{ route('contact.home') }}" class="form" method="POST">
        @csrf
          <div class="row mb-4">
            <div class="form-group col-6">
              <input type="text" class="form-control @error('nm_kontak') is-invalid @enderror" name="nm_kontak" value="{{ old('nm_kontak') }}" placeholder="Your Name" required>
            </div>
            <div class="form-group col-6">
              <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Your Phone" required>
            </div>
          </div>

          <div class="row mb-4">
            <div class="form-group col-12">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required>
            </div>
          </div>

          <div class="row mb-4">
            <div class="form-group col-12">
              <textarea name="desc_kontak" id="desc_kontak" cols="30" rows="10" class="form-control @error('desc_kontak') is-invalid @enderror" value="{{ old('desc_kontak') }}" placeholder="Type your message here.."></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <input type="submit" class="btn btn-primary" value="Send Message">
            </div>
          </div>

        </form>
      </div>
    </section>

    <div style="position:fixed;right:20px;bottom:20px;">
        <a href="https://api.whatsapp.com/send?phone=+6289687652965&text=ٱلسَّلَامُ عَلَيْكُمْ‎‎">
        <button style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px">
        <img src="https://web.whatsapp.com/img/favicon/1x/favicon.png"> Whatsapp Kami</button></a>
    </div>

    @include('user.includeUser.footerUser')

    <!-- GetButton.io widget -->
{{-- <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+6289687652965", // WhatsApp number
            call_to_action: "Hubungi Kami", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script> --}}
<!-- /GetButton.io widget -->

</div> <!-- .site-wrap -->

  <script src="{{ asset('assetsMe/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('assetsMe/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('assetsMe/js/popper.min.js') }}"></script>
  <script src="{{ asset('assetsMe/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assetsMe/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assetsMe/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('assetsMe/js/aos.js') }}"></script>
  <script src="{{ asset('assetsMe/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('assetsMe/js/jquery.sticky.js') }}"></script>
  <script src="{{ asset('assetsMe/js/isotope.pkgd.min.js') }}"></script>


  <script src="{{ asset('assetsMe/js/main.js') }}"></script>

  </body>
</html>
