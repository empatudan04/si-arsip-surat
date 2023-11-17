<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $dataKategori = Kategori::all();
        return view('kategori', ['dataKategori' => $dataKategori]);
    }
    public function create()
    {
        $maxIdKategori = Kategori::max('id_kategori');

        $nextID = $maxIdKategori + 1;
        return view('tambahKategori', ['nextID' => $nextID]);
    }

    public function store(Request $request)
    {
        // Validasi input sesuai kebutuhan
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        // Simpan data ke database
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect kembali ke halaman form tambah kategori
        return redirect()->route('kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }
    public function destroy($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);

            // Hapus kategori
            $kategori->delete();

            return redirect()->route('kategori')->with('success', 'Kategori berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1451) {
                return redirect()->route('kategori')->with('error', 'Gagal menghapus kategori. Kategori masih digunakan.');
            }

            return redirect()->route('kategori')->with('error', 'Gagal menghapus kategori. Error: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->route('kategori')->with('error', 'Kategori tidak ditemukan.');
        }

        return view('editKategori', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'nullable',
        ]);

        // Temukan data kategori berdasarkan ID
        $kategori = Kategori::find($id);

        if (!$kategori) {
            // Handle jika kategori tidak ditemukan, misalnya tampilkan pesan error
            return redirect()->route('kategori')->with('error', 'Kategori tidak ditemukan.');
        }

        // Update data kategori
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->keterangan = $request->input('keterangan');
        $kategori->save();

        // Redirect kembali ke halaman yang menampilkan daftar kategori
        return redirect()->route('kategori')->with('success', 'Kategori berhasil diperbarui.');
    }
}
