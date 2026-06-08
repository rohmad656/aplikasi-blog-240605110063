<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ruang Baca - Portal Informasi & Artikel Progresif</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8fafc;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar-visitor {
      background-color: #1e293b;
      padding: 1rem 0;
    }

    .navbar-brand-custom {
      font-weight: 700;
      font-size: 1.5rem;
      color: #ffffff !important;
      text-decoration: none;
    }

    .navbar-brand-custom span {
      color: #3b82f6;
    }

    .widget-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #1e293b;
      padding-bottom: 0.5rem;
      border-bottom: 2px solid #e2e8f0;
      margin-bottom: 1rem;
    }

    .list-category-item {
      transition: all 0.2s ease-in-out;
      color: #475569;
      text-decoration: none;
      display: block;
      padding: 0.5rem 0.75rem;
      border-radius: 6px;
    }

    .list-category-item:hover {
      background-color: #f1f5f9;
      color: #3b82f6;
      padding-left: 1rem;
    }

    .list-category-item.active {
      background-color: #3b82f6;
      color: #ffffff;
      font-weight: 600;
    }

    .footer-visitor {
      background-color: #0f172a;
      color: #94a3b8;
      padding: 2rem 0;
      margin-top: 5rem;
      border-top: 1px solid #334155;
    }
  </style>
</head>

<body class="d-flex flex-column" style="min-height: 100vh;">

  <nav class="navbar navbar-expand-lg navbar-dark navbar-visitor shadow-sm">
    <div class="container">
      <a class="navbar-brand-custom" href="{{ route('blog.index') }}">
        📰 Ruang<span>Baca</span>
      </a>
      <div class="ms-auto">
        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-light rounded-pill px-3 fw-semibold">
          Portal CMS
        </a>
      </div>
    </div>
  </nav>

  <main class="container my-5 flex-grow-1">
    @yield('content')
  </main>

  <footer class="footer-visitor text-center">
    <div class="container">
      <p class="mb-1 fw-bold text-white">&copy; 2026 RuangBaca - Proyek UAS Pemrograman Web</p>
      <small class="text-muted">Aplikasi Blog Berbasis Arsitektur MVC Framework Laravel 13 & Laragon Engine</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>