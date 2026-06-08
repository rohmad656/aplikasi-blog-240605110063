<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  // Menampilkan Halaman Utama Pengunjung
  public function index(Request $request)
  {
    $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();
    $query = Artikel::with(['penulis', 'kategori']);

    // Penyaringan Berdasarkan Pilihan Kategori di Widget Samping
    if ($request->has('kategori')) {
      $query->where('id_kategori', $request->kategori);
    }

    // Pastikan nama variabel menggunakan $articles (jamak)
    $articles = $query->orderBy('id', 'desc')->take(5)->get();

    // Mengirimkan variabel $articles ke dalam view blog.index
    return view('blog.index', compact('articles', 'categories'));
  }

  // Menampilkan Halaman Detail Baca Artikel
  public function show($id)
  {
    $article = Artikel::with(['penulis', 'kategori'])->findOrFail($id);
    $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

    // Mengambil 5 Artikel Terkait dari Kategori yang Sama (Kecuali Artikel Aktif)
    $relatedArticles = Artikel::where('id_kategori', $article->id_kategori)
      ->where('id', '!=', $article->id)
      ->orderBy('id', 'desc')
      ->take(5)
      ->get();

    return view('blog.show', compact('article', 'relatedArticles', 'categories'));
  }
}
