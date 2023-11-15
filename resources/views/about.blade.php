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

    <div class="container custom-font">
        <h2 class="mt-4" style="font-family:'Roboto',sans-serif;">About</h2>
        <div class="d-flex align-items-center my-4">
            <img src="{{ asset('images/saya.jpeg') }}" alt="Foto Anda" width="200" class="me-4">
            <div>
                <p class="mb-2 custom-font">Aplikasi ini dibuat oleh:</p>
                <p class="mb-2 custom-font">Nama: Resa Fajar Renaldhy</p>
                <p class="mb-2 custom-font">Prodi: D3-MI PSDKU Kediri</p>
                <p class="mb-2 custom-font">NIM: 2131730044</p>
                <p class="mb-2 custom-font">Tanggal Pembuatan Aplikasi: 09 November 2023</p>
            </div>
        </div>
    </div>
@endsection
