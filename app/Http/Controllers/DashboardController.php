<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Penulis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index(Request $request)
  {
    // 1. Menghitung akumulasi total data untuk komponen widget statistik
    $totalArtikel = Artikel::count();
    $totalKategori = KategoriArtikel::count();
    $totalPenulis = Penulis::count();

    // 2. Menangkap parameter kata kunci pencarian dari form dashboard
    $search = $request->input('search');

    // 3. Query untuk menarik artikel terbaru dengan teknik Eager Loading
    $query = Artikel::with(['penulis', 'kategori']);

    // Jika user melakukan pencarian, saring data berdasarkan judul atau isi
    if ($search) {
      $query->where(function ($q) use ($search) {
        $q->where('judul', 'like', "%{$search}%")
          ->orWhere('isi', 'like', "%{$search}%");
      });
    }

    // Ambil maksimal 5 artikel terbaru berdasarkan kondisi di atas
    $artikelTerbaru = $query->orderBy('id', 'desc')->take(5)->get();

    // Kirimkan seluruh data objek ke halaman view dashboard
    return view('dashboard', compact(
      'totalArtikel',
      'totalKategori',
      'totalPenulis',
      'artikelTerbaru',
      'search'
    ));
  }
}
