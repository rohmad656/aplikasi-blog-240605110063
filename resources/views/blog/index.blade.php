@extends('layouts.visitor')

@section('content')
<div class="row g-4">
  <div class="col-lg-8">
    <h4 class="fw-bold text-dark mb-4">
      {{ request()->has('kategori') ? '📋 Hasil Penyaringan Artikel' : '✨ Artikel Terbaru' }}
    </h4>

    @forelse($articles as $item)
    <div class="card border-0 shadow-sm rounded-3 mb-4 overflow-hidden bg-white">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="w-100 h-100 border-end" style="object-fit: cover; min-height: 180px;" alt="Cover">
        </div>
        <div class="col-md-8 d-flex flex-column">
          <div class="card-body p-4">
            <span class="badge bg-secondary mb-2" style="font-size: 11px;">
              {{ $item->kategori->nama_kategori }}
            </span>
            <h4 class="fw-bold mb-2">
              <a href="{{ route('blog.show', $item->id) }}" class="text-decoration-none text-dark">{{ $item->judul }}</a>
            </h4>
            <p class="text-muted small mb-3">
              {{ Str::limit(strip_tags($item->isi), 160, '...') }}
            </p>

            <a href="{{ route('blog.show', $item->id) }}" class="btn btn-link p-0 fw-bold text-primary text-decoration-none small">
              Kelanjutannya &rarr;
            </a>
          </div>
          <div class="card-footer bg-transparent border-0 px-4 pb-3 pt-0 mt-auto d-flex justify-content-between align-items-center text-muted small">
            <div>👤 Penulis: <span class="fw-semibold text-secondary">{{ $item->penulis->nama_depan }}</span></div>
            <div class="font-monospace">{{ $item->hari_tanggal }}</div>
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="text-center py-5 bg-white rounded-3 shadow-sm">
      <p class="text-muted mb-0 italic">Tidak ada publikasi artikel yang dapat ditampilkan.</p>
      @if(request()->has('kategori'))
      <a href="{{ route('blog.index') }}" class="btn btn-sm btn-secondary mt-3 rounded-pill">Lihat Semua Artikel</a>
      @endif
    </div>
    @endforelse
  </div>

  <div class="col-lg-4">
    <div class="card border-0 shadow-sm rounded-3 p-4 bg-white sticky-top" style="top: 24px;">
      <div class="widget-title">Kategori Artikel</div>
      <div class="d-flex flex-column gap-1">
        <a href="{{ route('blog.index') }}" class="list-category-item {{ !request()->has('kategori') ? 'active' : '' }}">
          All Categories
        </a>
        @foreach($categories as $kat)
        <a href="{{ route('blog.index', ['kategori' => $kat->id]) }}" class="list-category-item {{ request('kategori') == $kat->id ? 'active' : '' }}">
          {{ $kat->nama_kategori }}
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection