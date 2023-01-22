@extends('layouts.app1')
@section('title')
register
@endsection
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="heading-section">{{ "Registrasi Stuvent UP" }}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-4">
                    <div class="login-wrap p-0">
                        <form action="{{ route('register.store') }}" class="signin-form" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="type_user" id="type_user" class="form-control" required>
                                        <option class="form-control" disabled selected value="" style="color: black !important;">Pilih</option>
                                        <option class="form-control" value="user" style="color: black !important;">Mahasiswa Universitas Pertamina</option>
                                        <option class="form-control" value="umum" style="color: black !important;">Masyarakat Umum</option>
                                    </select>   
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Fullname" name="name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" placeholder="Password"
                                        name="password" required>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection