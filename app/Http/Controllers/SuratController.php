<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Support\Str;

class SuratController extends Controller
{
    public function index()
    {
        $dataSurat = Surat::all();

        return view('arsip', ['dataSurat' => $dataSurat]);
    }
    public function store(Request $request)
    {
        // Validasi data yang diunggah
        $validatedData = $request->validate([
            'nomor_surat' => 'required|string',
            'kategori' => 'required|exists:kategori,id_kategori', // Memastikan kategori yang diunggah ada dalam tabel kategori
            'judul' => 'required|string',
            'file_surat' => 'required|file|mimes:pdf', // Memastikan file adalah PDF
        ]);
    
        // Modify the filename
        $originalFilename = $request->file_surat->getClientOriginalName();
        $extension = $request->file_surat->getClientOriginalExtension();
        $slug = Str::slug(Carbon::now('Asia/Jakarta'));
        $slug = str_replace(' ', '', $slug);
        $newFilename = Str::slug($validatedData['kategori']) . '-' . Str::slug($validatedData['judul']) . '-' . $slug . '.' . $extension;
    
        // Simpan file surat ke direktori yang sesuai dengan custom filename
        $fileSuratPath = $request->file_surat->storeAs('surat', $newFilename);
    
        // Buat entitas surat baru
        $surat = new Surat;
        $surat->nomor_surat = $validatedData['nomor_surat'];
        $surat->kategori_id = $validatedData['kategori'];
        $surat->judul = $validatedData['judul'];
        $surat->file_surat = $fileSuratPath;
        $surat->waktu_pengarsipan = Carbon::now('Asia/Jakarta');
    
        $surat->save();
    
        // Redirect ke halaman tertentu setelah berhasil mengunggah
        return redirect()->route('arsip')->with('success', 'Arsip berhasil diunggah');
    }
    
    public function create(){
        $dataKategori = Kategori::all();
        return view('unggahArsip', compact('dataKategori'));    
    }
    public function show($id)
{
    // Temukan data surat berdasarkan ID
    $surat = Surat::find($id);

    if (!$surat) {
        // Handle jika surat tidak ditemukan, misalnya tampilkan pesan error
        return redirect()->route('arsip')->with('error', 'Surat tidak ditemukan.');
    }

    return view('lihatArsip', compact('surat'));
}
public function unduhArsip($id) {
    $surat = Surat::find($id);

    if (!$surat) {
        // Handle if the surat is not found, e.g., display an error message
        return redirect()->route('arsip')->with('error', 'Surat not found.');
    }

    $filePath = storage_path('app/public/' . $surat->file_surat);

    if (file_exists($filePath)) {
        $originalFilename = pathinfo($surat->file_surat, PATHINFO_FILENAME);
        $cleanedFilename = preg_replace('/[^a-zA-Z0-9_.-]/', '_', $originalFilename); // Sanitize the filename

        return response()->download($filePath, $cleanedFilename . '.' . pathinfo($surat->file_surat, PATHINFO_EXTENSION));
    } else {
        return redirect()->route('arsip')->with('error', 'File surat not found.');
    }
}
public function destroy($id)
{
    // Temukan surat berdasarkan ID
    $surat = Surat::find($id);

    // Periksa jika surat ditemukan
    if ($surat) {
        // Hapus surat
        $surat->delete();
        
        // Redirect kembali ke daftar surat dengan pesan sukses atau sesuaikan dengan kebutuhan Anda
        return redirect()->route('arsip')->with('success', 'Surat berhasil dihapus');
    } else {
        // Redirect kembali ke daftar surat dengan pesan kesalahan jika surat tidak ditemukan
        return redirect()->route('arsip')->with('error', 'Surat tidak ditemukan');
    }
}

}
