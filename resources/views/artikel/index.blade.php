@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="fw-bold text-dark">Data Artikel</h4>
  <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm rounded-2">Buat Artikel</a>
</div>
<div class="card border-0 shadow-sm rounded-3">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="p-3">Gambar</th>
          <th class="p-3">Judul</th>
          <th class="p-3">Kategori</th>
          <th class="p-3">Penulis</th>
          <th class="p-3">Tanggal</th>
          <th class="p-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($artikel as $item)
        <tr>
          <td class="p-3"><img src="{{ asset('storage/gambar/'.$item->gambar) }}" class="rounded border" style="width:60px; height:40px; object-fit:cover;"></td>
          <td class="p-3 fw-semibold text-dark">{{ $item->judul }}</td>
          <td class="p-3"><span class="badge bg-light text-dark border">{{ $item->kategori->nama_kategori }}</span></td>
          <td class="p-3 text-muted">{{ $item->penulis->nama_depan }}</td>
          <td class="p-3" style="font-size:13px;">{{ $item->hari_tanggal }}</td>
          <td class="p-3 text-center">
            <div class="d-inline-flex gap-2">
              <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
              <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus artikel?')">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center p-4 text-muted">Belum ada artikel yang diterbitkan.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection