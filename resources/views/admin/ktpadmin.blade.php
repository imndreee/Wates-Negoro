@extends('layouts.app')

@section('title', 'kelola ktp')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                            <div class="mb-3">
                                <h2 class="mb-0">{{ 'kelola ktp' }}</h2>
                                <p class="mb-0 text-sm">Kelola {{ 'kelola ktp' }} {{ config('app.name') }}</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('kelola-ktp') }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('form-search')
<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{ URL::current() }}" method="GET">
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('content')
    <h1>Data KTP</h1>

    <table>
        <thead>
            <tr>
                <th>Nomor KTP</th>
                {{-- Tambahkan kolom-kolom lain sesuai kebutuhan --}}
            </tr>
        </thead>
        <tbody>
            @foreach($ktps as $ktp)
                <tr>
                    <td>{{ $ktp->nomor_ktp }}</td>
                    {{-- Tambahkan kolom-kolom lain sesuai kebutuhan --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

