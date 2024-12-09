<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Title')</title>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
    </header>
    <main>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif

        <div class="container-fluid d-flex flex-column mb-2">
            <div class="title">
                <div class="row"></div>
                <div class="row d-flex align-items-end">
                    <div class="col-3 p-0 ps-2 pb-1 m-0 text-start fw-bold">
                        {{ \Carbon\Carbon::now()->format('F j, Y h:i A') }}
                    </div>
                    <div class="col-6 p-0 m-0 pb-3 text-center">
                        <img style="width: 500px; height: auto;" src="{{ asset('assets/images/tagline.png') }}"
                            alt="" class="taglineAdmin">
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="navs">
                <ul class="navigation">
                    <li class="nav-itemss {{ Request::routeIs('home') ? 'actives' : '' }}">
                        <a href="{{ route('home') }}" class="items">HOME</a>
                    </li>
                    <li
                        class="nav-itemss {{ Request::routeIs('article') && $title == 'News' ? 'actives' : '' }}">
                        <a href="{{ route('article', ['type' => 'News']) }}">NEWS</a>
                    </li>
                    <li
                        class="nav-itemss {{ Request::routeIs('article') && $title == 'Literary' ? 'actives' : '' }}">
                        <a href="{{ route('article', ['type' => 'Literary']) }}">LITERARY</a>
                    </li>
                    <li
                        class="nav-itemss {{ Request::routeIs('article') && $title == 'Sports' ? 'actives' : '' }}">
                        <a href="{{ route('article', ['type' => 'Sports']) }}">SPORTS</a>
                    </li>
                    <li
                        class="nav-itemss {{ Request::routeIs('article') && $title == 'Entertainment' ? 'actives' : '' }}">
                        <a href="{{ route('article', ['type' => 'Entertainment']) }}">ENTERTAINMENT</a>
                    </li>
                    <li class="nav-itemss {{ Request::routeIs('gallery') || Route::currentRouteName()=='gallery.view' ? 'actives' : '' }}">
                        <a href="{{ route('gallery') }}">GALLERY</a>
                    </li>
                    <li
                        class="nav-itemss {{ Request::routeIs('article') && $title == 'Event' ? 'actives' : '' }}">
                        <a href="{{ route('article', ['type' => 'Event']) }}">EVENTS</a>
                    </li>
                    <li
                        class="nav-itemss {{ Request::routeIs('article') && $title == 'Lifestyle' ? 'actives' : '' }}">
                        <a href="{{ route('article', ['type' => 'Lifestyle']) }}">LIFESTYLE</a>
                    </li>
                    <li class="nav-itemss {{ Request::routeIs('about') ? 'actives' : '' }}">
                        <a href="{{ route('about') }}">ABOUT US</a>
                    </li>
                    <li class="nav-itemss {{ Request::routeIs('request') ? 'actives' : '' }}">
                        <a href="{{ route('request') }}">SERVICE REQUEST</a>
                    </li>
                </ul>
            </div>

            @yield('main')

        </div>
    </main>
    <footer class="container-fluid m-0 p-0 bg-dark text-light py-1">
        <div class="d-flex flex-column gap-2 flex-lg-row justify-content-center align-items-center">
            <!-- Left Section -->
            <p class="col ps-3 m-0">
                © 2024 Breakthrough - CNSC The Official Publication of Camarines Norte State College
            </p>

            <!-- Right Section -->
            <div class="col m-0 p-0 d-flex flex-column flex-sm-row">
                <div
                    class="row d-flex flex-column flex-sm-row gap-2 align-items-start align-lg-items-center justify-content-center flex-wrap flex-lg-nowrap mx-1">
                    <!-- Email -->
                    <a href="mailto:breakthrough@cnsc.edu.ph" class="col d-flex gap-1 text-decoration-none text-white">
                        <img src="{{ asset('/assets/images/email.png') }}" style="width: 25px;" alt="">
                        <span class="text-nowrap">breakthrough@cnsc.edu.ph</span>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/breakthroughpub" target="_blank"
                        class="col d-flex gap-2 text-decoration-none text-white">
                        <img src="{{ asset('/assets/images/instagram.png') }}" style="width: 25px;" alt="">
                        <span class="text-nowrap">@breakthroughpub</span>
                    </a>
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/BreakthroughPub" target="_blank"
                        class="col d-flex gap-2 text-decoration-none text-white">
                        <img src="{{ asset('/assets/images/facebook.png') }}" style="width: 25px; height: 25px;"
                            alt="">
                        <span class="text-nowrap">Breakthrough - CNSC</span>
                    </a>
                    <!-- Twitter -->
                    <a href="https://twitter.com/BTPublication" target="_blank"
                        class="col d-flex gap-2 text-decoration-none text-white">
                        <img src="{{ asset('/assets/images/x.png') }}" style="width: 25px;" alt="">
                        <span class="text-nowrap">@BTPublication</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <!-- Bootstrap JS (needed for dropdown) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>
