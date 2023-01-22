@extends('layouts.app1')
@section('title')
    login
@endsection
@section('content')
    <section class="ftco-section" style="height: 100%;">
        <div class="container" style="height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;">
            <div class="card"
                style="display: flex;
                    justify-content: center;
                    padding: 2.5rem; background:rgba(255,255,255,0.1); border-radius:20px; box-shadow: 10px 15px 20px -10px rgb(0 0 0 / 50%); border-color: transparent;">
                <form action="{{ route('login') }}" class="signin-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <input style="background:inherit; border:1px solid rgba(0,0,0,.125)" type="text"
                            class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group" style="margin-top:1rem;">
                        <input style="background:inherit; border:1px solid rgba(0,0,0,.125)" id="password-field"
                            type="password" class="form-control" placeholder="Password" name="password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" style="margin-top: 1rem;">
                                <a href="/register" class="btn btn-block btn-outline-dark form-control">Daftar?</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group" style="margin-top:1rem;">
                                <button type="submit" class="form-control btn btn-outline-success submit px-3">Login</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:1rem;">
                        <button type="submit" class="form-control btn btn-success submit px-3">Kembali ke halaman utama</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
