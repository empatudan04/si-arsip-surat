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
    <h2 class="my-4" style="font-family: 'Roboto', sans-serif;">Kategori Surat >> Edit</h2>
    <p class="custom-font">Edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>
    <form method="POST" action="{{ route('kategori.update', $kategori->id_kategori) }}">
        @csrf
        <div class="mb-3">
            <label for="id_kategori" class="form-label">ID (Auto Increment):</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="{{ $kategori->id_kategori }}" disabled>
        </div>
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori:</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan">{{ $kategori->keterangan }}</textarea>
        </div>
        <a href="{{ route('kategori') }}" class="btn btn-secondary"> << Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
