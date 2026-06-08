@extends('layouts.app')

@section('content')
<h4 class="fw-bold text-dark mb-4">Tulis Artikel Baru</h4>
<div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
  <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-semibold">Judul Artikel</label>
      <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
      @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Klasifikasi Kategori</label>
      <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
        <option value="" disabled selected>-- Pilih Kategori --</option>
        @foreach($kategori as $kat)
        <option value="{{ $kat->id }}" {{ old('id_kategori') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
        @endforeach
      </select>
      @error('id_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Isi Konten</label>
      <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="6">{{ old('isi') }}</textarea>
      @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Cover Gambar Banner</label>
      <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
      @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="d-flex gap-2 justify-content-end">
      <a href="{{ route('artikel.index') }}" class="btn btn-light border">Batal</a>
      <button type="submit" class="btn btn-success">Terbitkan</button>
    </div>
  </form>
</div>
@endsection