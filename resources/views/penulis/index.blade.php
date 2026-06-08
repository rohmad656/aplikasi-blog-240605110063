@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="fw-bold text-dark">Data Penulis</h4>
  <a href="{{ route('penulis.create') }}" class="btn btn-primary btn-sm rounded-2">Tambah Penulis</a>
</div>
<div class="card border-0 shadow-sm rounded-3">
  <div class="table-responsive">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="p-3">Foto</th>
          <th class="p-3">Nama Lengkap</th>
          <th class="p-3">Username</th>
          <th class="p-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($penulis as $item)
        <tr>
          <td class="p-3"><img src="{{ asset('storage/foto/'.$item->foto) }}" class="rounded-circle border" style="width:40px; height:40px; object-fit:cover;"></td>
          <td class="p-3 fw-semibold">{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
          <td class="p-3 text-muted">{{ $item->user_name }}</td>
          <td class="p-3 text-center">
            <div class="d-inline-flex gap-2">
              <a href="{{ route('penulis.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
              <form action="{{ route('penulis.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus penulis ini?')">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4" class="text-center p-4 text-muted">Belum ada data penulis.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection