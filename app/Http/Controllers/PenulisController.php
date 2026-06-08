<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all();
        return view('penulis.index', compact('penulis'));
    }

    public function create()
    {
        return view('penulis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required|string|max:50',
            'nama_belakang' => 'required|string|max:50',
            'user_name' => 'required|string|max:50|unique:penulis,user_name',
            'password' => 'required|string|min:6',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('foto', $namaFoto, 'public');
            $data['foto'] = $namaFoto;
        }

        Penulis::create($data);
        return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil disimpan.');
    }

    public function edit($id)
    {
        $penulis = Penulis::findOrFail($id);
        return view('penulis.edit', compact('penulis'));
    }

    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);
        $request->validate([
            'nama_depan' => 'required|string|max:50',
            'nama_belakang' => 'required|string|max:50',
            'user_name' => 'required|string|max:50|unique:penulis,user_name,' . $penulis->id,
            'password' => 'nullable|string|min:6',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->except(['password', 'foto']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('foto')) {
            if ($penulis->foto && $penulis->foto != 'default.png') {
                Storage::disk('public')->delete('foto/' . $penulis->foto);
            }
            $file = $request->file('foto');
            $namaFoto = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('foto', $namaFoto, 'public');
            $data['foto'] = $namaFoto;
        }

        $penulis->update($data);
        return redirect()->route('penulis.index')->with('sukses', 'Profil penulis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penulis = Penulis::findOrFail($id);
        try {
            if ($penulis->foto && $penulis->foto != 'default.png') {
                Storage::disk('public')->delete('foto/' . $penulis->foto);
            }
            $penulis->delete();
            return redirect()->route('penulis.index')->with('sukses', 'Data penulis berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('penulis.index')->with('gagal', 'Gagal menghapus! Penulis ini memiliki relasi artikel aktif.');
        }
    }
}
