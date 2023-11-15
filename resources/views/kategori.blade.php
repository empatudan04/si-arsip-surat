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
    <h2 class="my-4" style="font-family: 'Roboto', sans-serif;">Kategori Surat</h2>
    <p class="custom-font">Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br> Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table id="kategoriTable" class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataKategori as $kategori)
            <tr>
                <td>{{ $kategori->id_kategori}}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>{{ $kategori->keterangan }}</td>
                <td>
                    <a href="{{ route('kategori.destroy', $kategori->id_kategori) }}" class="btn btn-danger">Hapus</a>
                    <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-3">
        <a href="{{route('tambah-kategori')}}" class="btn btn-success">Tambah Kategori</a>
    </div>
</div>
<script>
    new DataTable('#kategoriTable')
</script>
@endsection
