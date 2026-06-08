<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with(['penulis', 'kategori'])->get();
        return view('artikel.index', compact('artikel'));
    }

    public function create()
    {
        $kategori = KategoriArtikel::all();
        return view('artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->all();
        $data['id_penulis'] = Auth::user()->id;
        $data['hari_tanggal'] = now()->toDateString();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('gambar', $namaGambar, 'public');
            $data['gambar'] = $namaGambar;
        }

        Artikel::create($data);
        return redirect()->route('artikel.index')->with('sukses', 'Artikel baru berhasil diterbitkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = KategoriArtikel::all();
        return view('artikel.edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $request->validate([
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->except(['id_penulis', 'hari_tanggal', 'gambar']);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete('gambar/' . $artikel->gambar);
            }
            $file = $request->file('gambar');
            $namaGambar = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('gambar', $namaGambar, 'public');
            $data['gambar'] = $namaGambar;
        }

        $artikel->update($data);
        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->gambar) {
            Storage::disk('public')->delete('gambar/' . $artikel->gambar);
        }
        $artikel->delete();
        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil dihapus secara permanen.');
    }
}
