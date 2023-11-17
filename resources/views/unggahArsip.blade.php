@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    .custom-font {
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        font-weight: bold;
    }
</style>
<div class="container">
    <h2 class="my-4" style="font-family: 'Roboto', sans-serif;">Arsip Surat >> Unngah</h2>
    <p class="custom-font">Unggah surat yang telah terbit pada form ini untuk diarsipkan.
    <br>Catatan. <br> - Gunakan file berformat PDF</p>
    <form method="POST" action="{{route('arsip.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nomor_surat" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori">
                @foreach ($dataKategori as $kategori)
                    <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="judul" class a="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul">
        </div>
        <div class="mb-3">
            <label for="file_surat" class="form-label">Unggah File Surat (PDF)</label>
            <input type="file" class="form-control" id="file_surat" name="file_surat" accept=".pdf">
        </div>
        <a href="{{ route('arsip') }}" class="btn btn-secondary"> << Kembali</a>
        <button type="submit" class="btn btn-primary">Unggah</button>
    </form>
</div>
@endsection
