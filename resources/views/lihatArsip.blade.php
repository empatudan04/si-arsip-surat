@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    .custom-font {
        font-family: 'Roboto', sans-serif;
        font-weight: bold;
    }
</style>
<div class="container">
    <h2 class="my-4 custom-font">Arsip Surat > > Lihat</h2>

    <div>
        <h3>Nomor: {{ $surat->nomor_surat }}</h3>
        <h3>Kategori: {{ $surat->kategori->nama_kategori }}</h3>
        <h3>Judul: {{ $surat->judul }}</h3>
        <h3>Waktu Unggah: {{ $surat->waktu_pengarsipan }}</h3>
        <embed src="{{ asset('storage/' . $surat->file_surat) }}" type="application/pdf" width="100%" height="600px" />
        <div class="mt-3">
        <a href="{{ route('arsip') }}" class="btn btn-primary"> < < Kembali</a>
            <a href="{{ route('unduh-arsip', $surat->id_surat) }}" class="btn btn-success">Unduh</a>
            <a href="" class="btn btn-warning">Edit/Ganti File</a>
        </div>
    </div>
</div>
@endsection
