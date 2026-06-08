@extends('layouts.app')

@section('content')
<h4 class="fw-bold text-dark mb-4">Ubah Artikel</h4>
<div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
  <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label fw-semibold">Judul Artikel</label>
      <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $artikel->judul) }}">
      @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Klasifikasi Kategori</label>
      <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
        @foreach($kategori as $kat)
        <option value="{{ $kat->id }}" {{ old('id_kategori', $artikel->id_kategori) == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
        @endforeach
      </select>
      @error('id_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Isi Konten</label>
      <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="6">{{ old('isi', $artikel->isi) }}</textarea>
      @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
      <label class="form-label fw-semibold">Ganti Gambar Cover Banner</label>
      <div class="mb-2"><img src="{{ asset('storage/gambar/'.$artikel->gambar) }}" class="img-thumbnail" style="width:120px;"></div>
      <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
      @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="d-flex gap-2 justify-content-end">
      <a href="{{ route('artikel.index') }}" class="btn btn-light border">Batal</a>
      <button type="submit" class="btn btn-primary">Perbarui</button>
    </div>
  </form>
</div>
@endsection