<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuTamuController extends Controller
{
    // Menampilkan daftar buku tamu
    // Algoritma: Mengambil semua data buku tamu dari database dan mengirimkan data tersebut ke view index.
    public function index()
    {
        $data = BukuTamu::all();
        return view('bukutamu.index', compact('data'));
    }

    // Menampilkan form untuk menambah buku tamu baru
    // Algoritma: Mengembalikan tampilan form create untuk input data baru.
    public function create()
    {
        return view('bukutamu.create');
    }

    // Menyimpan data buku tamu baru ke dalam database
    // Algoritma:
    // 1. Validasi input dari pengguna.
    // 2. Jika terdapat file gambar, simpan file tersebut dan masukkan path-nya ke dalam data yang divalidasi.
    // 3. Buat data buku tamu baru menggunakan data yang telah divalidasi.
    // 4. Redirect ke tampilan index.
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
            'email.required'  => 'Email wajib diisi',
            'email.email'     => 'Email tidak valid',
            'email.unique'    => 'Email sudah terdaftar',
            'phone.required'  => 'Nomor telepon wajib diisi',
            'city.required'   => 'Kota wajib diisi',
            'status.required' => 'Status wajib diisi',
            'status.in'       => 'Status tidak valid',
            'gambar.image'    => 'Gambar harus berupa file gambar',
            'gambar.max'      => 'Ukuran gambar maksimal 2MB'
        ]);

        if($request->hasFile('gambar')){
            $path = $request->file('gambar')->store('bukutamu', 'public');
            $validated['gambar'] = $path;
        }

        BukuTamu::create($validated);
        return redirect()->route('bukutamu.index');
    }

    // Menampilkan detail buku tamu tertentu
    // Algoritma: Mengambil data buku tamu berdasarkan parameter ID dan mengirimkannya ke view show.
    public function show(BukuTamu $bukutamu)
    {
        return view('bukutamu.show', compact('bukutamu'));
    }

    // Menampilkan form untuk mengedit data buku tamu
    // Algoritma: Mengambil data buku tamu yang akan diedit dan mengirimkannya ke view edit.
    public function edit(BukuTamu $bukutamu)
    {
        return view('bukutamu.edit', compact('bukutamu'));
    }

    // Memperbarui data buku tamu ke dalam database
    // Algoritma:
    // 1. Validasi input yang dikirim dari form edit.
    // 2. Jika terdapat file gambar baru, hapus gambar lama (jika ada) dan simpan gambar baru.
    // 3. Perbarui data buku tamu dengan data yang telah divalidasi.
    // 4. Redirect ke tampilan index.
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

    // Menghapus data buku tamu dari database
    // Algoritma:
    // 1. Jika terdapat gambar terkait, hapus file gambar tersebut dari storage.
    // 2. Hapus data buku tamu dari database.
    // 3. Redirect ke tampilan index.
    public function destroy(BukuTamu $bukutamu)
    {
        if($bukutamu->gambar){
            Storage::disk('public')->delete($bukutamu->gambar);
        }
        $bukutamu->delete();
        return redirect()->route('bukutamu.index');
    }
}
