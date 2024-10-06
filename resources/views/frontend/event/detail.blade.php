@extends('frontend.layouts.main')

@section('content')
 <!-- jumbotron -->
 <section class="header-section">
    <div class="overlay"></div>
    <div class="container-fluid p-5 mb-4 jumbotron text-center text-white">
        <div class="container py-5">
          <h4 class="fw-bold mb-4" style="color: #a78f75">
            November 4 - 5, 2023
          </h4>
          <h1 class="display-5 fw-bold mb-2">HACKATHON</h1>
          <h1 class="display-5 fw-bold mb-2">NATIONAL 2024</h1>
          <p class="col-md-8 fs-4 mx-auto politeknik">
            <i class="bx bx-map"></i> POLITEKNIK NEGERI PADANG
          </p>
          <div class="d-flex flex-column flex-md-row justify-content-center">
            <button
              class="btn btn-primary me-md-3 mb-2 mb-md-0"
              style="border-radius: 50px"
              type="button"
            >
              Example button
            </button>
            <button
              class="btn btn-outline-light"
              style="border-radius: 50px"
              type="button"
            >
              Example button
            </button>
          </div>
        </div>
      </div>
      <!-- jumbotron -->
    
      <!-- sponsor section -->
      <div class="container sponsor mb-5">
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
      </div>
    
 </section>
 
 <div class="kotak1">

 </div>

<!-- main -->
<section class="main-section mt-4">
    <div class="container">
      <!-- Menggunakan container agar tidak terlalu mepet ke tepi -->
      <div class="row d-flex justify-content-between gx-5">
        <!-- gx-5 untuk jarak horizontal lebih besar antar kolom -->
        <div class="col-12 col-md-5 me-4">
          <!-- Menggunakan col-12 untuk ukuran layar kecil -->
          <h2>Ready to go next level?</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro
            voluptates quis iusto amet perferendis blanditiis dolores aut
            saepe quas eaque eum laboriosam, inventore voluptate mollitia eos
            cumque accusantium enim adipisci tempora neque nihil quo! Adipisci
            dolores amet odit molestias asperiores.
          </p>
          <div class="d-flex flex-column flex-md-row">
            <!-- Flexbox untuk tombol -->
            <button
              class="btn btn-primary me-md-3 mb-2 mb-md-0"
              style="border-radius: 50px"
              type="button"
            >
              Example button
            </button>
            <button
              class="btn btn-outline-dark"
              style="border-radius: 50px"
              type="button"
            >
              Example button
            </button>
          </div>
        </div>
        <div class="col-12 col-md-5 ms-4">
          <!-- Menggunakan col-12 untuk ukuran layar kecil -->
          <img
            src="/images/DSC_0029.JPG"
            alt="HACKATHON"
            width="100%"
            height="80%"
          />
        </div>
      </div>
    </div>
  </section>

  <div class="kotak2">
    
  </div>

  <section class="pt-2 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-3">Galery Event CyberTech</h3>
        </div>
        <div class="col-6 text-end">
          <a
            class="btn btn-primary mb-3 me-1"
            href="#carouselExampleIndicators2"
            role="button"
            data-bs-slide="prev"
          >
            <i class="fa fa-arrow-left"></i>
          </a>
          <a
            class="btn btn-primary mb-3"
            href="#carouselExampleIndicators2"
            role="button"
            data-bs-slide="next"
          >
            <i class="fa fa-arrow-right"></i>
          </a>
        </div>
        <div class="col-12">
          <div id="carouselExampleIndicators2" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <img
                        class="img-fluid"
                        alt="100%x280"
                        src="/images/DSC_0029.JPG"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                          With supporting text below as a natural lead-in.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <img
                        class="img-fluid"
                        alt="100%x280"
                        src="/images/DSC_0029.JPG"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                          With supporting text below as a natural lead-in.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <img
                        class="img-fluid"
                        alt="100%x280"
                        src="/images/DSC_0029.JPG"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                          With supporting text below as a natural lead-in.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Additional carousel items -->
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <img
                        class="img-fluid"
                        alt="100%x280"
                        src="/images/DSC_0029.JPG"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                          With supporting text below as a natural lead-in.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <img
                        class="img-fluid"
                        alt="100%x280"
                        src="/images/DSC_0029.JPG"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                          With supporting text below as a natural lead-in.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="card">
                      <img
                        class="img-fluid"
                        alt="100%x280"
                        src="/images/DSC_0029.JPG"
                      />
                      <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">
                          With supporting text below as a natural lead-in.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </section>

  <div class="contact-person">
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
  </div>



{{-- 
<div style="height: 100px"></div>
<div class="card mb-3">
    @if($event->images->isNotEmpty())
        <img class="card-img-top" src="{{ asset('storage/media/' . $event->images->first()->path) }}" alt="{{ $event->title }}" style="height: 100px; width: fit-content" />
    @else
        <img class="card-img-top" src="{{ asset('default-image.jpg') }}" alt="Default Image" style="height: 100px; width: fit-content" />
    @endif

    <div class="card-body">
        <h4 class="card-title">{{ $event->title }}</h4>
        <div class="card-text">{!! $event->description !!}</div>
        <p class="card-text"><small class="text-muted">{{ $event->event_date }}</small></p>
        @if($event->registration_url)
            <a href="{{ $event->registration_url }}" class="btn btn-primary">Register</a>
        @endif
        <a href="/event/{{ $event->id }}" class="btn btn-secondary">Details</a>
    </div>
</div>
 --}}
@endsection
