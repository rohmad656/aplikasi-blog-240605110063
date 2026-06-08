@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="fw-bold text-dark">Data Kategori</h4>
  <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm rounded-2">Tambah Kategori</a>
</div>
<div class="card border-0 shadow-sm rounded-3">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="p-3">Nama Kategori</th>
          <th class="p-3">Keterangan</th>
          <th class="p-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($kategori as $item)
        <tr>
          <td class="p-3 fw-semibold text-dark">{{ $item->nama_kategori }}</td>
          <td class="p-3 text-muted">{{ $item->keterangan ?? '-' }}</td>
          <td class="p-3 text-center">
            <div class="d-inline-flex gap-2">
              <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
              <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="text-center p-4 text-muted">Belum ada data kategori.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection