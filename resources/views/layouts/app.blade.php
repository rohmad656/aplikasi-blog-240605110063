<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CMS Control Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8fafc;
      font-family: 'Segoe UI', Roboto, sans-serif;
    }

    .sidebar {
      min-height: 100vh;
      background-color: #1e293b;
      color: #fff;
    }

    /* Efek Transisi Menu Sidebar */
    .sidebar .nav-link {
      color: #94a3b8;
      transition: all 0.25s ease-in-out;
    }

    .sidebar .nav-link:hover {
      color: #fff;
      background-color: rgba(255, 255, 255, 0.05);
      padding-left: 12px;
      border-radius: 6px;
    }

    .sidebar .nav-link.active {
      color: #fff;
      background-color: #3b82f6;
      border-radius: 6px;
    }

    /* Animasi Transisi Halaman Konten */
    @keyframes fadeInPage {
      from {
        opacity: 0;
        transform: translateY(8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .page-animate {
      animation: fadeInPage 0.4s ease-out forwards;
    }

    /* Efek Hover Komponen */
    .card {
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      border: none;
    }

    .card:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05) !important;
    }

    .btn {
      transition: all 0.2s ease-in-out;
    }
  </style>
</head>

<body class="bg-light">
  <div class="container-fluid">
    <div class="row">

      <div class="col-12 d-md-none bg-dark text-white p-3 d-flex justify-content-between align-items-center shadow-sm">
        <span class="fw-bold mb-0">CMS Panel</span>
        <button class="btn btn-dark border-0 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5" />
          </svg>
        </button>
      </div>

      <div class="col-md-3 col-lg-2 p-3 sidebar offcanvas-md offcanvas-start" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="d-flex flex-column justify-content-between h-100 w-100">
          <div>
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
              <h5 class="fw-bold mb-0 text-white w-100 text-center" id="sidebarMenuLabel">CMS Panel</h5>
              <button type="button" class="btn-close btn-close-white d-md-none" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
            </div>
            <ul class="nav nav-pills flex-column gap-2">
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">Kategori</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('penulis.index') }}" class="nav-link {{ request()->routeIs('penulis.*') ? 'active' : '' }}">Penulis</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('artikel.index') }}" class="nav-link {{ request()->routeIs('artikel.*') ? 'active' : '' }}">Artikel</a>
              </li>
            </ul>
          </div>

          <div class="pt-3 border-top border-secondary mt-4">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?')">
              @csrf
              <button type="submit" class="btn btn-outline-danger w-100 btn-sm rounded-2 fw-semibold">Keluar Sistem</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-9 col-lg-10 p-4 page-animate">
        @if(session('sukses'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
          <div class="fw-semibold">{{ session('sukses') }}</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('gagal'))
        <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
          <div class="fw-semibold">{{ session('gagal') }}</div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @yield('content')
      </div>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>