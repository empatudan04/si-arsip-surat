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
    <h2 class="my-4" style="font-family: 'Roboto', sans-serif;">Kategori Surat >> Tambah</h2>
    <p class="custom-font">Tambahkan data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>
    <form method="POST" action="{{ route('kategori.store') }}">
        @csrf
        <div class="mb-3">
            <label for="id_kategori" class="form-label">ID (Auto Increment):</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori" value="{{ $nextID }}" disabled>
        </div>
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori:</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan:</label>
            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
        </div>
        <a href="{{ route('kategori') }}" class="btn btn-secondary"> << Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
