@extends('layouts.visitor')

@section('content')
<div class="row g-4">
  <div class="col-lg-8">
    <div class="card border-0 shadow-sm rounded-3 p-4 p-md-5 bg-white">
      <span class="badge bg-primary align-self-start mb-3 px-3 py-2 rounded-2" style="font-size: 12px;">
        {{ $article->kategori->nama_kategori }}
      </span>

      <h1 class="fw-bold text-dark mb-3" style="line-height: 1.3;">{{ $article->judul }}</h1>

      <div class="d-flex flex-wrap gap-3 align-items-center text-muted small mb-4 pb-3 border-bottom">
        <div>By: <strong class="text-dark">{{ $article->penulis->nama_depan }} {{ $article->penulis->nama_belakang }}</strong></div>
        <div>Published: <span class="font-monospace">{{ $article->hari_tanggal }}</span></div>
      </div>

      <img src="{{ asset('storage/gambar/' . $article->gambar) }}" class="img-fluid rounded-3 mb-4 shadow-sm w-100" style="max-height: 380px; object-fit: cover;" alt="Banner">

      <div class="text-dark lh-lg" style="text-align: justify; font-size: 1.05rem; white-space: pre-line;">
        {!! e($article->isi) !!}
      </div>

      <div class="mt-5 pt-4 border-top">
        <a href="{{ route('blog.index') }}" class="btn btn-outline-dark rounded-pill px-4 btn-sm fw-semibold">
          &larr; Kembali ke Beranda
        </a>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card border-0 shadow-sm rounded-3 p-4 bg-white sticky-top" style="top: 24px;">
      <div class="widget-title">Artikel Terkait</div>
      <div class="d-flex flex-column gap-3">
        @forelse($relatedArticles as $related)
        <div class="d-flex gap-3 align-items-start border-bottom pb-3">
          <img src="{{ asset('storage/gambar/' . $related->gambar) }}" class="rounded border" style="width: 75px; height: 55px; object-fit: cover;" alt="Thumb">
          <div style="min-width: 0;">
            <h6 class="fw-bold mb-1" style="font-size: 13px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4;">
              <a href="{{ route('blog.show', $related->id) }}" class="text-decoration-none text-dark hover-primary">{{ $related->judul }}</a>
            </h6>
            <small class="text-muted font-monospace" style="font-size: 11px;">{{ $related->hari_tanggal }}</small>
          </div>
        </div>
        @empty
        <p class="text-muted small italic mb-0">Tidak ditemukan tulisan terkait lainnya dalam kategori ini.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection