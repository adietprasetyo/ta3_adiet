@extends('masterUser')
@section('contentUser')

<div class="site-blocks-cover overlay bg-light" id="home-section">

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-12 mt-lg-5 text-left align-self-center text-intro">
          <div class="row">
            <div class="col-lg-6">
              <h1 class="text-black">I'm Ben Carson</h1>
              <p class="lead">I'm Web Developer Based on NY City</p>
              <p><a href="#portfolio-section" class="btn smoothscroll btn-primary">Portfolio</a></p>

            </div>
          </div>
        </div>

      </div>
    </div>

    <img src="{{ asset('assetsMe/images/face.png') }}" alt="Image" class="img-face" data-aos="fade">


  </div>




  <div class="site-section" id="services-section">
    <div class="container">
      <div class="row ">
        <div class="col-12 mb-5 position-relative">
          <h2 class="section-title text-center mb-5">My Services</h2>
        </div>

        <div class="col-md-6 mb-4">
          <div class="service d-flex h-100">
            <div class="service-number mr-4"><span class="icon-style"></span></div>
            <div class="service-about">
              <h3>UI/UX Designer</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ipsum error eligendi molestiae eaque quas, ducimus sequi excepturi?</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="service d-flex h-100">
            <div class="service-number mr-4"><span class="icon-business_center"></span></div>
            <div class="service-about">
              <h3>Web Development</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ipsum error eligendi molestiae eaque quas, ducimus sequi excepturi?</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="service d-flex h-100">
            <div class="service-number mr-4"><span class="icon-desktop_windows"></span></div>
            <div class="service-about">
              <h3>Brand &amp; Logo Design</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ipsum error eligendi molestiae eaque quas, ducimus sequi excepturi?</p>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="service d-flex h-100">
            <div class="service-number mr-4"><span class="icon-layers"></span></div>
            <div class="service-about">
              <h3>Web Design</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ipsum error eligendi molestiae eaque quas, ducimus sequi excepturi?</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="site-section" id="about-section">
    <div class="container">
      <div class="row ">
        <div class="col-12 mb-4 position-relative">
          <h2 class="section-title">About Me</h2>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 mb-4 mb-lg-0">
          <div class="bg-light pt-5">
          <img src="{{ asset('assetsMe/images/face.png') }}" alt="Image" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-4 order-2 order-lg-1">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ipsum error eligendi molestiae eaque quas, ducimus sequi excepturi?</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ipsum error eligendi molestiae eaque quas, ducimus sequi excepturi?</p>
        </div>
        <div class="col-lg-4 order-3 order-lg-3">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis ipsum error eligendi molestiae eaque quas, ducimus sequi excepturi?</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam qui maiores, ipsa quibusdam distinctio! Expedita ipsum ex porro obcaecati.</p>
          <p><a href="#contact-section" class="btn smoothscroll btn-primary">Contact Me</a></p>
        </div>

      </div>
    </div>
  </div>




  <section class="site-section block__62272" id="portfolio-section">


    <div class="container">
      <div class="row mb-5">
        <div class="col-12 position-relative">
          <h2 class="section-title text-center mb-5">My Portfolio</h2>
        </div>
      </div>


      <div id="posts" class="row no-gutter">
        <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
          <a href="{{ asset('assetsMe/images/post_2.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_2.jpg') }}">
          </a>
        </div>
        <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
          <a href="{{ asset('assetsMe/images/post_3.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_3.jpg') }}">
          </a>
        </div>

        <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
          <a href="{{ asset('assetsMe/images/post_4.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_4.jpg') }}">
          </a>
        </div>

        <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">

          <a href="{{ asset('assetsMe/images/post_5.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_5.jpg') }}">
          </a>

        </div>

        <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
          <a href="{{ asset('assetsMe/images/post_6.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_6.jpg') }}">
          </a>
        </div>

        <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
          <a href="{{ asset('assetsMe/images/post_2.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_2.jpg') }}">
          </a>
        </div>

        <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
          <a href="{{ asset('assetsMe/images/post_3.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_3.jpg') }}">
          </a>
        </div>

        <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
          <a href="{{ asset('assetsMe/images/post_4.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_4.jpg') }}">
          </a>
        </div>

        <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
          <a href="{{ asset('assetsMe/images/post_6.jpg') }}" class="item-wrap fancybox">
            <span class="icon-search2"></span>
            <img class="img-fluid" src="{{ asset('assetsMe/images/post_6.jpg') }}">
          </a>
        </div>


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
        <div class="slide">
          <blockquote>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p><cite>&mdash; Jean Smith</cite></p>
          </blockquote>
        </div>
        <div class="slide">
          <blockquote>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p><cite>&mdash; Carl Spencer</cite></p>
          </blockquote>
        </div>
        <div class="slide">
          <blockquote>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            <p><cite>&mdash; Ryan Peters</cite></p>
          </blockquote>
        </div>
      </div>
    </div>
  </section>

  <section class="site-section"  id="clients-section">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-5 position-relative">
          <h2 class="section-title text-center">Clients</h2>
        </div>
        <div class="col-6 col-sm-6 col-md-4 col-lg-4 text-center">
          <img src="{{ asset('assetsMe/images/logo_1.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-6 col-sm-6 col-md-4 col-lg-4 text-center">
          <img src="{{ asset('assetsMe/images/logo_2.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-6 col-sm-6 col-md-4 col-lg-4 text-center">
          <img src="{{ asset('assetsMe/images/logo_3.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-6 col-sm-6 col-md-4 col-lg-4 text-center">
          <img src="{{ asset('assetsMe/images/logo_4.jpg') }}" alt="Image" class="img-fluid">
        </div>


        <div class="col-6 col-sm-6 col-md-4 col-lg-4 text-center">
          <img src="{{ asset('assetsMe/images/logo_5.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-6 col-sm-6 col-md-4 col-lg-4 text-center">
          <img src="{{ asset('assetsMe/images/logo_6.jpg') }}" alt="Image" class="img-fluid">
        </div>
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
      <form action="#" class="form">
        <div class="row mb-4">
          <div class="form-group col-6">
            <input type="text" class="form-control" placeholder="First name">
          </div>
          <div class="form-group col-6">
            <input type="text" class="form-control" placeholder="Last name">
          </div>
        </div>

        <div class="row mb-4">
          <div class="form-group col-12">
            <input type="email" class="form-control" placeholder="Email address">
          </div>
        </div>

        <div class="row mb-4">
          <div class="form-group col-12">
            <input type="text" class="form-control" placeholder="Subject of the message">
          </div>
        </div>

        <div class="row mb-4">
          <div class="form-group col-12">
            <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Type your message here.."></textarea>
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
@endsection
