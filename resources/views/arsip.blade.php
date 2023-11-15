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
<body>
<div class="container">
    <h2 class="my-4" style="font-family: 'Roboto', sans-serif;">Arsip Surat</h2>
    <p class="custom-font">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>
        Klik "Lihat" pada kolom aksi untuk menampilkan surat di atas tabel tersebut.</p>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <table id="arsipTable" class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataSurat as $surat)
            <tr>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->kategori->nama_kategori }}</td>
                <td>{{ $surat->judul }}</td>
                <td>{{ $surat->waktu_pengarsipan }}</td>
                <td>
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $surat->id_surat }}">Hapus</a>
                    <a href="{{ route('unduh-arsip', $surat->id_surat) }}" class="btn btn-warning">Unduh</a>
                    <a href="{{ route('lihat-arsip', $surat->id_surat) }}" class="btn btn-primary">Lihat>></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-3">
        <a href="{{route('unggah-arsip')}}" class="btn btn-success">Arsipkan Surat</a>
    </div>
</div>
@foreach($dataSurat as $surat)
<div class="modal fade" id="deleteModal{{ $surat->id_surat }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $surat->id_surat }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $surat->id_surat }}">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus surat ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="{{ route('hapus-surat', $surat->id_surat) }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
    
</body>
<script>
    new DataTable('#arsipTable')
</script>

@endsection
