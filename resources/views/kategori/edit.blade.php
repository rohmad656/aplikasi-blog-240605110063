@extends('layouts.app')

@section('content')
<h4 class="fw-bold text-dark mb-4">Ubah Kategori</h4>
<div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
  <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label fw-semibold">Nama Kategori</label>
      <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
      @error('nama_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Keterangan</label>
      <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan', $kategori->keterangan) }}</textarea>
      @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="d-flex gap-2 justify-content-end">
      <a href="{{ route('kategori.index') }}" class="btn btn-light border">Batal</a>
      <button type="submit" class="btn btn-primary">Perbarui</button>
    </div>
  </form>
</div>
@endsection