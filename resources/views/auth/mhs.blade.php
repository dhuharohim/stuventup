@extends('layouts.app1')
@section('title')
    register Mahasiswa
@endsection
@section('content')
    <style>
        #mhs_photo:hover {
            cursor: pointer;
        }
    </style>
    <div class="container" style="height: 100%;">
        <div class="body" style="display: flex;
    place-content: center;
    align-items: center;
    height: 100%;">
            <div class="card"
                style="display: flex;
        height: fit-content;
        padding: 1.5rem; background:rgba(255,255,255,0.1); border-radius:20px; box-shadow: 10px 15px 20px -10px rgb(0 0 0 / 50%); border-color: transparent;">
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post">
                        {{-- @csrf   --}}
                        <div class="row">
                            <div class="circle" style="display: flex;
                        place-content: center;">
                                <a id="mhs_photo">
                                    <box-icon
                                        style="border: 2px solid rgba(0,0,0,.125);
                                border-radius: 10px;
                                width: 5rem;
                                height: 5rem;
                               "
                                        type='solid' name='user' size="lg" color="rgba(0,0,0,.125)"></box-icon>
                                </a>
                                <input name="mhs_upload" type="file" style="display: none;" id="mhs_upload">
                                <img style="width: 5rem;
                            height: auto; border: 2px solid rgba(0,0,0,.125);
                                border-radius: 10px; display: none;"
                                    id="mhs_preview" src="#" alt="">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" hidden value="mhs" id="type_reg">
                                    <input placeholder="Nama depan"
                                        style="background:inherit; border:1px solid rgba(0,0,0,.125)" class="form-control"
                                        type="text" id="firstname" name="firstname" autofocus value="" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input placeholder="Nama belakang"
                                        style="background:inherit; border:1px solid rgba(0,0,0,.125)" class="form-control"
                                        type="text" id="lastname" name="lastname" autofocus value="" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="form-group">
                                    <input placeholder="Email" style="background:inherit; border:1px solid rgba(0,0,0,.125)"
                                        class="form-control" type="email" id="email" name="email" autofocus
                                        value="" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <span class="input-group-text" style="position: fixed;
                                    background: transparent;
                                    border: 1px solid rgba(0,0,0,.125);
                                    max-width: 55px;
                                    justify-content: center;">(+62)</span>
                                    <input placeholder="Handphone"
                                    style="text-indent:3rem; background:inherit; border:1px solid rgba(0,0,0,.125)" class="form-control"
                                    maxlength="13" type="number" id="handphone" name="handphone" autofocus value="" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            @php
                                $study = ['Teknik Elektro', 'Teknik Geofisika', 'Teknik Geologi', 'Teknik Logistik', 'Teknik Sipil', 'Teknik Mesin', 'Teknik Kimia', 'Teknik Lingkungan', 'Teknik Perminyakan', 'Ilmu Komputer', 'Ilmu Kimia', 'Ilmu Komunikasi', 'Ilmu Kimia', 'Ilmu Ekonomi', 'Hubungan Internasional', 'Manajemen'];
                            @endphp
                            <select required
                                style="background:inherit; border:1px solid rgba(0,0,0,.125); text-align: center;"
                                name="study_program" class="form-control" id="study_program">
                                <option style="color: rgba(0,0,0,.125)" class="form-control" value="" selected>--Pilih
                                    program studi--</option>
                                @foreach ($study as $std)
                                    <option class="form-control" value="{{ $std }}">{{ $std }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <div class="form-group">
                                    <input placeholder="Username"
                                        style="background:inherit; border:1px solid rgba(0,0,0,.125)" class="form-control"
                                        type="text" id="username" name="username" autofocus value="" required />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input placeholder="Password"
                                        style="background:inherit; border:1px solid rgba(0,0,0,.125)" class="form-control"
                                        type="password" id="password" name="password" autofocus value="" required />
                                </div>
                            </div>
                        </div>
                        <div class="submit d-grid mt-4">
                            <button id="registMhs" class="btn btn-outline-success btn-block"> Daftar Sekarang </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_custom')
    <script>
        
        $(document).ready(function() {
            $('#mhs_photo').click(function() {
                $('#mhs_upload').click();
                $('#mhs_photo').hide()
    
            });
            $('#mhs_upload').change(function(e) {
                const file = $(this)[0].files[0];
                console.log(file);
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $('#mhs_preview').attr('src', event.target.result)
                        $('#mhs_preview').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#mhs_photo').show()
                }
            })
            $('#registMhs').click(function(e){
                const fo =  $('input#mhs_upload').prop('files')[0];
                console.log(fo);
                var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
                const fd = new FormData();
                fd.append("_token", CSRF_TOKEN);
                fd.append('mhs_upload', fo);
                fd.append('firstname', $('#firstname').val());
                fd.append('lastname', $('#lastname').val());
                fd.append('email', $('#email').val());
                fd.append('handphone', $('#handphone').val());
                fd.append('study_program', $('#study_program').val());
                fd.append('username', $('#username').val());
                fd.append('password', $('#password').val());
                fd.append('type_reg', $('#type_reg').val());
    
                $.ajax({
                    url: "{{ route('register.store','umum') }}",
                    type: "post",
                    data: fd, 
                    cache: false,
                    contentType: false, //tell jquery to avoid some checks
                    processData: false,
                    success: function(res) {
                        iziToast.show({
                            title: "Sukses",
                            position: 'topLeft',
                            message: 'Berhasil membuat akun mahasiswa',
                            color: 'green'
                        })
        
                        setTimeout(() => {
                            window.location.href = "/login"
                        }, 2000);
                    },
                    error: function(res) {
                        iziToast.show({
                            title: "Error",
                            position: 'topLeft',
                            message: "Gagal membuat akun",
                            color: 'red'
                        })
                    }
                });
            })
        })
    </script>
@endsection
