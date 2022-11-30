<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ env('APP_NAME') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        @if (Route::has('login'))
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">Home</a>
          </li>
          @else
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register_voter') }}">Register</a>
            </li>
          @endif
          <li class="nav-item dropdown">
            {{-- <a class="nav-link" href="{{ route('login') }}">Login</a> --}}
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Penyelenggara</a></li>
              <li><a class="dropdown-item" href="{{ route('login_voter') }}">Peserta</a></li>
            </ul>
          </li>
          @endauth
        </ul>
        @endif

        {{-- @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}
      </div>
    </div>
  </nav>

  {{-- Hero --}}
  <section id="hero">
    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="{{asset('/images/undraw_selected_options_re_vtjd.svg')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">Pemilihan.id</h1>
          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit pariatur nulla explicabo nemo cumque provident omnis obcaecati consequuntur suscipit dolores cum doloremque assumenda iste, voluptatibus nisi harum, vero ex. Iusto.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Register</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Login</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Info --}}
  <section id="info">
    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold">Pemilihan.id</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa harum praesentium inventore fugit autem dolorum totam veritatis perspiciatis doloribus vel dolore, fuga expedita facilis debitis nemo possimus quia excepturi similique?</p>
      </div>
    </div>
  </section>

  {{-- footer --}}
    <footer class="pt-5 mt-5 border-top bg-dark text-white">
      <div class="container ">
        <div class="row">
          <div class="col mb-3">
            <h2>Pemilihan.id</h2>
            <p>Pemilihan aman dan terpercaya</p>
            <p class="text-muted">&copy; 2022</p>
          </div>
      
          <div class="col mb-3">
      
          </div>
      
          <div class="col mb-3">
            <h5>Tentang Kami</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tentang</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Syarat dan Ketentuan</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kebijakan Privasi</a></li>
            </ul>
          </div>
      
          <div class="col mb-3">
            <h5>Bantuan</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Butuh Bantuan?</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kontak</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            </ul>
          </div>
      
          <div class="col mb-3">
            <h5>Ikuti Kami</h5>
            <div class="row">
              <div class="col"><i class="bi bi-facebook"></i></div>
              <div class="col"><i class="bi bi-twitter"></i></div>
              <div class="col"><i class="bi bi-instagram"></i></div>
            </div>
          </div>
        </div>
      </div>
      
    </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>