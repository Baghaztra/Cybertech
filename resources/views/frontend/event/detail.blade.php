@extends('frontend.layouts.main')

@section('content')
    <style>
        .btn-anu {
            position: relative;
            background-color: #007bff;
            /* Warna biru untuk tombol */
            color: #ffffff;
            /* Warna teks putih */
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
            text-decoration: none;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            /* Hilangkan border default */
            border-radius: 8px;
            cursor: pointer;
            z-index: 1;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-anu::before {
            content: "";
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border-radius: 12px;
            /* Radius yang lebih besar agar mengikuti tombol */
            background: linear-gradient(135deg, #ff7f7f, #ffb77f, #ffea7f, #b7ff7f, #7fffff, #7f7bff);
            background-size: 600% 600%;
            animation: gradient 15s ease infinite;
            z-index: -1;
        }

        .btn-anu:hover {
            transform: scale(1.05);
            /* Sedikit membesar saat hover */
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
        }

        .btn-anu:active {
            transform: scale(0.98);
            /* Sedikit mengecil saat ditekan */
        }

        @keyframes gradient {
            0% {
                background-position: 0% 0%;
            }

            50% {
                background-position: 100% 100%;
            }

            100% {
                background-position: 0% 0%;
            }
        }
    </style>
    <!-- jumbotron -->
    <section
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ $event->jumbotron ? "'" . asset('media/' . $event->jumbotron->path) . "'" : '/images/DSC_0029.JPG' }});
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                font-family: 'Inter';
                height: 100vh;">
        {{-- <div class="overlay"></div> --}}
        <div class="container-fluid p-5 jumbotron text-center text-white h-100">
            <div class="container py-5  d-flex justify-content-center align-items-center h-100"
                style="flex-direction: column">
                <h4 class="fw-bold mb-4 text-white">
                    {{ Carbon\Carbon::parse($event->event_date)->format('l / d F, Y') }}
                </h4>
                <h1 class="display-5 fw-bold mb-2 text-white">{{ $event->title }}</h1>
                <p class="col-md-8 fs-4 mx-auto politeknik">
                    <i class="fa-solid fa-location-dot"></i> Politeknik Negeri Padang
                </p>
                <div class="d-flex flex-column flex-md-row justify-content-center">
                    @if ($event->form)
                        <a class="btn-anu" href="{{ '/form/' . $event->form->id }}">
                            Register!
                        </a>
                    @elseif($event->registration_url)
                        <a class="btn-anu" href="{{ $event->registration_url }}">
                            Register!
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <!-- jumbotron -->

        <!-- sponsor section -->
        {{-- <div class="container sponsor mb-5">
        <div class="row text-center">
          <h5>Sponsored By</h5>
        </div>
        <div class="row d-flex justify-content-center text-center">
          <div class="col-6 col-md-3">
            <!-- col-6 untuk tampilan kecil -->
            Google
          </div>
          <div class="col-6 col-md-3">Microsoft</div>
          <div class="col-6 col-md-3">Amazon</div>
        </div>
      </div> --}}
        <div class="position-absolute bottom-0 end-0 p-3">
            <a href="#info" class="text-white">
                <i class="bx bx-chevron-down bx-lg"></i>
            </a>
        </div>

    </section>

    <!-- main -->
    <section class="main-section mt-4" id="info">
        <div class="container">
            <!-- Menggunakan container agar tidak terlalu mepet ke tepi -->
            <div class="row d-flex justify-content-center">
                <!-- gx-5 untuk jarak horizontal lebih besar antar kolom -->
                <!-- saya hapus ya, Ki, biar mepetin aja #bagas -->
                <div class="col-12 col-md-6">
                    <!-- Menggunakan col-12 untuk ukuran layar kecil -->
                    {{-- <h2>Ready to go next level?</h2> --}}
                    <div>
                        {!! $event->description !!}
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- Menggunakan col-12 untuk ukuran layar kecil -->
                    <img src="{{ $event->poster ? asset('media/' . $event->poster->path) : '/images/DSC_0029.JPG' }}"
                        alt="entahlah" width="100%" height="fit-content" />
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row my-3">
                <!-- Flexbox untuk tombol -->
                @if ($event->form)
                    <a class="btn-anu me-md-3 mb-2 mb-md-0" href="{{ '/form/' . $event->form->id }}">
                        Register!
                    </a>
                @elseif($event->registration_url)
                    <a class="btn-anu me-md-3 mb-2 mb-md-0" href="{{ $event->registration_url }}">
                        Register!
                    </a>
                @endif

            </div>
        </div>
    </section>

    <section class="pt-2 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-3">Galery</h3>
                </div>
                @if (count($event->defaultImg) > 3)
                    <div class="col-6 text-end">
                        <a class="btn btn-primary mb-3 me-1" href="#carouselExampleIndicators2" role="button"
                            data-bs-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button"
                            data-bs-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                @endif
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($event->defaultImg->chunk(3) as $key => $chunk)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach ($chunk as $img)
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <img class="img-fluid" alt="100%x280"
                                                        src="{{ asset('media/' . $img->path) }}" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="contact-person">
    <div class="container my-5">
      <div class="row d-flex justify-content-center ">
       
        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="/images/IMG_1794.jpg" class="card-img-top" alt="...">
          </div>
        </div>
        <div class="col-md-4">
          <h2>contact us</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius debitis accusantium et facere, ratione dolore!</p>
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
