<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Cybertech - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" value="{{ request()->getSchemeAndHttpHost() }}" id="nameServer">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href={{ asset('/assets/cyberlogo.png') }} type="image/*" />
    <input type="hidden" value="{{ asset('kaiadmin-lite-1.2.0/assets/css/fonts.min.css') }}" id="links">
    <!-- Fonts and icons -->
    <script src={{ asset('kaiadmin-lite-1.2.0/assets/js/plugin/webfont/webfont.min.js') }}></script>
    <script>
        const links = document.querySelector("#links").value;
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: [links],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href={{ asset('kaiadmin-lite-1.2.0/assets/css/bootstrap.min.css') }} />
    <link rel="stylesheet" href={{ asset('kaiadmin-lite-1.2.0/assets/css/plugins.min.css') }} />
    <link rel="stylesheet" href={{ asset('kaiadmin-lite-1.2.0/assets/css/kaiadmin.min.css') }} />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href={{ asset('kaiadmin-lite-1.2.0/assets/css/demo.css') }} />
</head>
