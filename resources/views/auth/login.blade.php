<!DOCTYPE html>
<html lang="en">

@section('title', 'Login')
@include('admin.layouts.head')
<script src="{{ asset('login.js') }}"></script>

<body>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="h1 text-center">Login</h1>
                        <div style="display: grid; place-items: center;">
                            <img src={{ asset('assets/cyberlogo.png') }} style="width: 150px;" alt="">
                        </div>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan email" aria-describedby="helpId" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password" aria-describedby="helpId" />
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" name="showPass" id="showPass" onclick="test()"
                                    placeholder="Masukkan password" aria-describedby="helpId" />
                                <label for="showPass" class="form-label">Show Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* CSS Tambahan untuk responsive behavior */
        .container {
            max-width: 100%;
            padding: 15px;
        }

        @media (min-width: 768px) {
            .container {
                max-width: 500px;
            }
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 30px;
        }
    </style>
</body>

</html>
