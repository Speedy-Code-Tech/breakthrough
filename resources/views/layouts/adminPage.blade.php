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
        <div class="container-fluid d-flex justify-content-end align-items-center">
            <!-- Dropdown for logout -->
            <div class="dropdown ">
                <button class="btn dropdown-toggle text-white fw-bold" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Hello {{auth()->user()->name}}!
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Form for logging out -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        
    </header>
    <main>
        @yield('main')
    </main>
    <footer class="container-fluid m-0 p-0 bg-dark text-light py-1">
        <div class="d-flex flex-column gap-2 flex-lg-row justify-content-center align-items-center">
            <!-- Left Section -->
            <p class="col ps-3 m-0">
                © 2024 Breakthrough - CNSC The Official Publication of Camarines Norte State College
            </p>

            <!-- Right Section -->
            <div class="col m-0 p-0 d-flex flex-column flex-sm-row">
                <div class="row d-flex flex-column flex-sm-row gap-2 align-items-start align-lg-items-center justify-content-center flex-wrap flex-lg-nowrap mx-1">
                    <!-- Email -->
                    <a href="mailto:breakthrough@cnsc.edu.ph" class="col d-flex gap-1 text-decoration-none text-white">
                        <img src="{{ asset('/assets/images/email.png') }}" style="width: 25px;" alt="">
                        <span class="text-nowrap">breakthrough@cnsc.edu.ph</span>
                    </a>
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/breakthroughpub" target="_blank" class="col d-flex gap-2 text-decoration-none text-white">
                        <img src="{{ asset('/assets/images/instagram.png') }}" style="width: 25px;" alt="">
                        <span class="text-nowrap">@breakthroughpub</span>
                    </a>
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/breakthroughcnsc" target="_blank" class="col d-flex gap-2 text-decoration-none text-white">
                        <img src="{{ asset('/assets/images/facebook.png') }}" style="width: 25px; height: 25px;" alt="">
                        <span class="text-nowrap">Breakthrough - CNSC</span>
                    </a>
                    <!-- Twitter -->
                    <a href="https://twitter.com/BTPublication" target="_blank" class="col d-flex gap-2 text-decoration-none text-white">
                        <img src="{{ asset('/assets/images/x.png') }}" style="width: 25px;" alt="">
                        <span class="text-nowrap">@BTPublication</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
