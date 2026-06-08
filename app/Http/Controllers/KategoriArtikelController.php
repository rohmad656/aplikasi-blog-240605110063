<?php

namespace App\Http\Controllers;

use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategori = KategoriArtikel::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_artikel,nama_kategori',
            'keterangan' => 'nullable|string',
        ]);

        KategoriArtikel::create($request->all());
        return redirect()->route('kategori.index')->with('sukses', 'Kategori baru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_artikel,nama_kategori,' . $kategori->id,
            'keterangan' => 'nullable|string',
        ]);

        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('sukses', 'Data kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = KategoriArtikel::findOrFail($id);
        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('sukses', 'Kategori berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('gagal', 'Kategori gagal dihapus karena masih terikat dengan artikel aktif.');
        }
    }
}
