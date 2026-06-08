@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

  <div class="card border-0 shadow-sm p-4 bg-white rounded-3 mb-4">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
      <div>
        <h2 class="fw-bold text-dark mb-1">Selamat Datang, {{ Auth::user()->nama_depan }}!</h2>
        <p class="text-muted mb-0">Sistem terhubung menggunakan database aktif: <span class="badge bg-success-subtle text-success border border-success border-opacity-25 rounded-pill px-2.5">db_blog</span></p>
      </div>
      <div class="text-end">
        <small class="text-muted d-block small">Waktu Aktivitas Login:</small>
        <span class="font-monospace fw-bold text-primary" style="font-size: 14px;">
          {{ session('waktu_login', now()->toDateTimeString()) }}
        </span>
      </div>
    </div>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
        <div>
          <span class="text-muted small fw-semibold d-block mb-1" style="font-size: 11px; letter-spacing: 0.5px;">TOTAL ARTIKEL</span>
          <h2 class="fw-bold text-dark mb-0">{{ $totalArtikel }}</h2>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
        <div>
          <span class="text-muted small fw-semibold d-block mb-1" style="font-size: 11px; letter-spacing: 0.5px;">TOTAL KATEGORI</span>
          <h2 class="fw-bold text-dark mb-0">{{ $totalKategori }}</h2>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
        <div>
          <span class="text-muted small fw-semibold d-block mb-1" style="font-size: 11px; letter-spacing: 0.5px;">TOTAL PENULIS</span>
          <h2 class="fw-bold text-dark mb-0">{{ $totalPenulis }}</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="card border-0 shadow-sm rounded-3 bg-white overflow-hidden">
    <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
      <h6 class="fw-bold text-dark mb-0 fs-5">
        {{ $search ? 'Hasil Pencarian Konten Dasbor' : 'Artikel Terbaru yang Baru Di-upload' }}
      </h6>

      <form action="{{ route('dashboard') }}" method="GET" class="d-flex gap-2 align-items-center" style="max-width: 320px; width: 100%;">
        <input type="text" name="search" class="form-control form-control-sm rounded-2" placeholder="Cari judul artikel..." value="{{ $search }}">
        @if($search)
        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-light border btn-sm py-1 px-2.5 text-decoration-none text-muted small">Reset</a>
        @endif
        <button type="submit" class="btn btn-sm btn-primary px-3 rounded-2 py-1">Cari</button>
      </form>
    </div>
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th class="p-3 text-secondary small fw-bold">Gambar</th>
            <th class="p-3 text-secondary small fw-bold">Judul Artikel</th>
            <th class="p-3 text-secondary small fw-bold">Kategori</th>
            <th class="p-3 text-secondary small fw-bold">Penulis</th>
            <th class="p-3 text-secondary small fw-bold">Tanggal Rilis</th>
          </tr>
        </thead>
        <tbody>
          @forelse($artikelTerbaru as $item)
          <tr>
            <td class="p-3">
              <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="rounded border" style="width: 50px; height: 35px; object-fit: cover;" alt="Cover">
            </td>
            <td class="p-3 fw-semibold text-dark text-truncate" style="max-width: 280px;">{{ $item->judul }}</td>
            <td class="p-3">
              <span class="badge bg-secondary-subtle text-secondary border border-secondary border-opacity-10 rounded-2" style="font-size: 11px;">
                {{ $item->kategori->nama_kategori }}
              </span>
            </td>
            <td class="p-3 text-muted small">{{ $item->penulis->nama_depan }}</td>
            <td class="p-3 font-monospace small" style="font-size: 12px;">{{ $item->hari_tanggal }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center p-4 text-muted italic small">
              {{ $search ? 'Artikel dengan kata kunci tersebut tidak dapat ditemukan.' : 'Belum ada record data artikel yang di-upload ke dalam database.' }}
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection