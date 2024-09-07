<!DOCTYPE html>
<html lang="en">

@section('title', 'Login')
@include('admin.layouts.head')
<script src="{{ asset('login.js') }}"></script>

<body>
    <style>
        #iconShowPass {
            position: absolute;
            height: auto;
            top: 25%;
            right: 18px;
            font-size: 18px;
            cursor: pointer;
            color: rgb(88, 88, 88);
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <div style="display: grid; place-items: center;">
                            <img src={{ asset('assets/cyberlogo.png') }} style="width: 100px;" alt="">
                        </div>
                        <h1 class="h3 text-center mb-1">Please Login</h1>
                        <div id="error-message"></div>

                        <form method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan email" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="inpt" style="position: relative">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Masukkan password" style="padding-right: 45px" />
                                    <i class="fas fa-eye" id="iconShowPass" onclick="changeType()"></i>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary w-100" id="btnLogin">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.scripts')
    @vite(['resources/js/auth/login.js'])
</body>

</html>
