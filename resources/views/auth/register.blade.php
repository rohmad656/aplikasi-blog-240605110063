<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Penulis Baru - Portal CMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animated-card {
      animation: fadeInUp 0.5s ease-out forwards;
    }

    .smooth-btn {
      transition: all 0.3s ease;
    }

    .smooth-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(25, 135, 84, 0.15);
    }
  </style>
</head>

<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">

        <div class="card border-0 shadow-sm rounded-4 bg-white animated-card">
          <div class="card-header bg-white border-0 pt-4 px-4">
            <ul class="nav nav-tabs nav-fill border-bottom-0">
              <li class="nav-item">
                <a class="nav-link text-muted fw-semibold" href="{{ route('login') }}">Masuk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active fw-bold border-bottom border-success border-3" href="{{ route('register') }}">Daftar Baru</a>
              </li>
            </ul>
          </div>

          <div class="card-body p-4 pt-3">
            <form action="{{ route('register.process') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-semibold text-muted">Nama Depan</label>
                  <input type="text" name="nama_depan" class="form-control py-2 @error('nama_depan') is-invalid @enderror" value="{{ old('nama_depan') }}" required>
                  @error('nama_depan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-semibold text-muted">Nama Belakang</label>
                  <input type="text" name="nama_belakang" class="form-control py-2 @error('nama_belakang') is-invalid @enderror" value="{{ old('nama_belakang') }}" required>
                  @error('nama_belakang') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold text-muted">Username</label>
                <input type="text" name="user_name" class="form-control py-2 @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" required>
                @error('user_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="mb-4">
                <label class="form-label fw-semibold text-muted">Password</label>
                <input type="password" name="password" class="form-control py-2 @error('password') is-invalid @enderror" required>
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <button type="submit" class="btn btn-success w-100 py-2.5 rounded-3 fw-bold smooth-btn">Daftar Akun Baru</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>