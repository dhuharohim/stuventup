@extends('layouts.app1')
@section('title')
    register
@endsection
@section('content')
    <style>
        .card {
            color: black !important;
            transition: 0.3s;
        }

        .card:hover {
            background-color: #198754 !important;
            color: white !important;
        }

        a {
            text-decoration: none !important;
        }
    </style>
    <section class="ftco-section" style="height:100%;">
        <div class="container"
            style="height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;">
            <div class="row justify-content-center" style="padding: 12rem;">
                <div class="col-md-6" style="padding: 0 2rem;">
                    <a href="{{ route('registerIndex','mhs') }}">
                        <div class="card"
                            style="display: flex;
                        height: fit-content;
                        padding: 1rem; background:rgba(255,255,255,0.1); border-radius:20px; box-shadow: 10px 15px 20px -10px rgb(0 0 0 / 50%); border-color: transparent; place-items: center;">
                            <img src="{{ asset('assets/img/mhs.svg') }}" alt="" style="width: 41%;">
                            <p style="font-size: 12px; margin-top:1rem">Mahasiswa Universitas Pertamina</p>

                        </div>
                    </a>
                </div>
                <div class="col-md-6" style="padding: 0 2rem;">
                    <a href="{{ route('registerIndex', 'umum') }}"">
                        <div class="card"
                            style="display: flex;
                        height: fit-content;
                        padding: 1rem; background:rgba(255,255,255,0.1); border-radius:20px; box-shadow: 10px 15px 20px -10px rgb(0 0 0 / 50%); border-color: transparent; place-items: center;">
                            <img src="{{ asset('assets/img/umum.svg') }}" alt="" style="width: 50%;">
                            <p style=" font-size: 12px; margin-top: 1rem;">Masyarakat Umum</p>

                        </div>
                    </a>
                </div>
                <p style="text-align: center;
                margin-top: 3rem; font-size:12px;">Sudah punya akun? <a href="{{ route('home') }}">Login disini</a></p>
            </div>
        </div>
    </section>
@endsection
