@extends('frontend.layouts.main')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/image-carausel.jpg" class="d-block w-100" alt="...">
                    <div class="overlay"></div>
                    <div class="carousel-caption  d-flex align-items-center justify-content-center h-100">
                        <div class="row d-flex justify-content-center gx-6">
                            <div class="col-lg-4 col-sm-6 me-4" style="height: 100;">
                                <h1 class="fw-semibold">Lorem ipsum dolor sit.</h1>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                
                            </div>
                            <div class="col-lg-4 col-sm-6 ms-4">
                                <h1 class="">Lorem ipsum dolor sit.</h1>
                                <p class="">
                                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto ex quia mollitia provident sunt? Recusandae deleniti error, facilis ex minima debitis inventore blanditiis quisquam temporibus ipsum maxime incidunt molestiae consequatur culpa veniam nobis rerum doloremque, dolorum voluptatem expedita quibusdam officiis illo cum natus? Itaque, dolorem ad? Commodi distinctio corporis cum.
                                </p>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon d-flex align-items-center" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <div class="container">
            <h1 class="text-center mt-5" style="color: #486284">Tentang CyberTech</h1>
            <div class="container text-start" style="color: #8CA2C0;">
                <div class="row align-items-start mt-3">
                  <div class="col">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat tenetur ratione quasi voluptas omnis veritatis totam qui iusto quia. Nobis minima vitae possimus totam, aliquid eius? Accusantium aperiam quo sequi.
                  </div>
                  <div class="col">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium autem aperiam deleniti sint, veniam pariatur dolorum quidem labore, ipsam harum in illo fuga at eveniet sunt ab? At, nostrum placeat.
                  </div>
                </div>
              </div>
              <img src="/images/home.JPG" class="rounded-5 img-fluid mt-5" alt="...">
        </div>
    </body>
    </html>
@endsection