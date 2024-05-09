@extends('layouts.layout')
@section('title', 'Website Resmi Pemerintah Desa ' . $desa->nama_desa . ' - Beranda')

@section('styles')
    <meta name="description"
        content="Website Resmi Pemerintah Desa {{ $desa->nama_desa }}, Kecamatan {{ $desa->nama_kecamatan }}, Kabupaten {{ $desa->nama_kabupaten }}. Melayani pembuatan surat keterangan secara online">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        .ikon {
            font-family: fontAwesome;
        }

        .progress-label>span {
            color: white;
        }

        .progress-percentage>span {
            color: white;
        }

        .judul {
            color: white;
        }

        .animate-up:hover {
            top: -5px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .success-message {
            color: #27ae60;
            text-align: center;
        }
    </style>
@endsection

@section('header')
    <h1 class="text-white text-muted">LAYANAN SURAT</h1>
    <p class="text-white">Dengan menggunakan layanan website Desa {{ $desa->nama_desa }}, masyarakat dapat dengan mudah
        membuat beberapa surat keterangan berikut ini secara online.</p>
    </div>
    </form>
@endsection

@section('content')
    <div class="row">1
        <div class="col-md">
            <div id="" class="owl-theme"
                style="z-index: 0; background: #fff; border-radius: 10px; padding: 25px 30px;">
                <form action="{{ route('pelayanan.kirim-permintaan') }}" method="post">
                    @csrf
                    <input type="text" name="layanan" value="surat domisili" required readonly hidden>

                    <label for="nik">NIK:</label>
                    <input type="text" name="nik" required>
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" name="nama" required>
                    <button type="submit">Kirim Permintaan</button>
                </form>
                <!-- Tampilkan notifikasi sukses -->
                @if (session('success'))
                    <p class="success-message">{{ session('success') }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/apbdes.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#owl-one').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                smartSpeed: 1000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        });
    </script>
@endpush
