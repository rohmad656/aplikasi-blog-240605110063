@extends('layouts.app')

@section('content')
<h4 class="fw-bold text-dark mb-4">Tambah Akun Penulis</h4>
<div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
  <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nama Depan</label>
        <input type="text" name="nama_depan" class="form-control @error('nama_depan') is-invalid @enderror" value="{{ old('nama_depan') }}">
        @error('nama_depan') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nama Belakang</label>
        <input type="text" name="nama_belakang" class="form-control @error('nama_belakang') is-invalid @enderror" value="{{ old('nama_belakang') }}">
        @error('nama_belakang') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Username</label>
      <input type="text" name="user_name" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}">
      @error('user_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Password</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
      @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Foto Profil</label>
      <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
      @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="d-flex gap-2 justify-content-end">
      <a href="{{ route('penulis.index') }}" class="btn btn-light border">Batal</a>
      <button type="submit" class="btn btn-success">Simpan Akun</button>
    </div>
  </form>
</div>
@endsection