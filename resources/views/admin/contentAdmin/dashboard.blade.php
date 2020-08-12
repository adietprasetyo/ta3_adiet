@extends('masterAdmin')
@section('content')
<div class="content-wrapper">
    <div class="container">

        <div class="card bg-info mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h2 class="text-white"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- Dashboard --}}
        <div class="row">

              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{ $product }}</h3>

                    <p><h4 style="font-family: 'Times New Roman', Times, serif; font-weight:bold; letter-spacing: 1px">Product</h4></p>
                  </div>
                  <div class="icon">
                    <i class="mdi mdi-tag-multiple" aria-hidden="true"></i>
                  </div>
                  <a href="{{ route('produk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{ $category }}</h3>

                    <p><h4 style="font-family: 'Times New Roman', Times, serif; font-weight:bold; letter-spacing: 1px">Category</h4></p>
                  </div>
                  <div class="icon">
                    <i class="mdi mdi-library-books" aria-hidden="true"></i>
                  </div>
                  <a href="{{ route('category.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
              <!-- ./col -->

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $contact }}</h3>

                  <p><h4 style="font-family: 'Times New Roman', Times, serif; font-weight:bold; letter-spacing: 1px">Contact</h4></p>
                </div>
                <div class="icon">
                  <i class="mdi mdi-contact-mail" aria-hidden="true"></i>
                </div>
                <a href="{{ route('contact.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>{{ $testimoni }}</h3>

                    <p><h4 style="font-family: 'Times New Roman', Times, serif; font-weight:bold; letter-spacing: 1px">Testimoni</h4></p>
                  </div>
                  <div class="icon">
                    <i class="mdi mdi-human-handsup" aria-hidden="true"></i>
                  </div>
                  <a href="{{ route('testimoni.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
