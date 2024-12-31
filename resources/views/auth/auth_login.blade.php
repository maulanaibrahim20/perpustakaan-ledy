<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in with cover - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
    </title>
    <!-- CSS files -->
    <link href="{{ url('/admin') }}/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="{{ url('/admin') }}/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="{{ url('/admin') }}/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="{{ url('/admin') }}/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="{{ url('/admin') }}/css/demo.min.css?1692870487" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column bg-white">
    <script src="{{ url('/admin') }}/js/demo-theme.min.js?1692870487"></script>
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            @yield('content')
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-100 min-vh-100"
                style="background-image: url({{ url('/admin') }}/static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg)">
            </div>
        </div>
    </div>

    <script src="{{ url('/admin') }}/js/tabler.min.js?1692870487" defer></script>
    <script src="{{ url('/admin') }}/js/demo.min.js?1692870487" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('success'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
    @if (session('error'))
        <script type="text/javascript">
            Swal.fire({
                title: "Gagal",
                text: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif
</body>

</html>
