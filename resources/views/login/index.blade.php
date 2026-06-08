<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center min-vh-100">
  <div class="container col-md-4 card p-4 shadow-sm">
    <h3 class="text-center mb-4">CMS Login</h3>
    @if($errors->has('gagal')) <div class="alert alert-danger small p-2 text-center">{{ $errors->first('gagal') }}</div> @endif
    <form action="{{ route('login.proses') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required autofocus>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</body>

</html>