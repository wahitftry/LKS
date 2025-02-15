<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuTamuController extends Controller
{
    // Tampilkan daftar buku tamu
    public function index()
    {
        $data = BukuTamu::all();
        return view('bukutamu.index', compact('data'));
    }

    // Tampilkan form tambah data
    public function create()
    {
        return view('bukutamu.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required',
            'email'  => 'required|email|unique:bukutamus',
            'phone'  => 'required',
            'city'   => 'required',
            'status' => 'required|in:Active,Inactive',
            'gambar' => 'nullable|image|max:2048'
        ], [
            'nama.required'   => 'Nama wajib diisi',
            // ...pesan validasi lainnya...
        ]);

        if($request->hasFile('gambar')){
            $path = $request->file('gambar')->store('bukutamu', 'public');
            $validated['gambar'] = $path;
        }

        BukuTamu::create($validated);
        return redirect()->route('bukutamu.index');
    }

    // Tampilkan detail data
    public function show(BukuTamu $bukutamu)
    {
        return view('bukutamu.show', compact('bukutamu'));
    }

    // Tampilkan form edit data
    public function edit(BukuTamu $bukutamu)
    {
        return view('bukutamu.edit', compact('bukutamu'));
    }

    // Update data
    public function update(Request $request, BukuTamu $bukutamu)
    {
        $validated = $request->validate([
            'nama'   => 'required',
            'email'  => "required|email|unique:bukutamus,email,{$bukutamu->id}",
            'phone'  => 'required',
            'city'   => 'required',
            'status' => 'required|in:Active,Inactive',
            'gambar' => 'nullable|image|max:2048'
        ]);

        if($request->hasFile('gambar')){
            if($bukutamu->gambar){
                Storage::disk('public')->delete($bukutamu->gambar);
            }
            $path = $request->file('gambar')->store('bukutamu', 'public');
            $validated['gambar'] = $path;
        }

        $bukutamu->update($validated);
        return redirect()->route('bukutamu.index');
    }

    // Hapus data
    public function destroy(BukuTamu $bukutamu)
    {
        if($bukutamu->gambar){
            Storage::disk('public')->delete($bukutamu->gambar);
        }
        $bukutamu->delete();
        return redirect()->route('bukutamu.index');
    }
}
