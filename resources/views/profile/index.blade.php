@extends('base-admin')

@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-sm-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('profile.index') }}"><i class="bx bx-user me-1"></i>
                            Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('setting.index') }}"><i class="bx bx-bell me-1"></i> Setting</a>
                    </li>
                </ul>
                <div class="card">
                    <h4 class="fw-bold p-4" style="padding-bottom: 0.05rem !important;"><span
                            class="text-muted fw-light">Setting Profile / </span>
                        {{ $user->name }}</h4>

                    {{-- <h5 class="card-header">Profile Details</h5> --}}
                    <hr class="my-0" />
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            {{-- <img src="/assets/img/himpunan/himakom.jpeg" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar" /> --}}
                            <img alt="image"
                                src="/assets/img/profile/{{ $profile['photo'] == '' ? 'default.png' : $profile['photo'] }}"
                                class="d-block rounded" height="100" width="100" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-2" tabindex="0">
                                    <a href="javascript:void(0)" class="d-none d-sm-block" id="change_img"
                                        style="color:white">Ubah foto</a>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="profile_img" id="profile_img" class="account-file-input"
                                        hidden />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-2"
                                    id="reset">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">{{ __('Reset') }}</span>
                                </button>

                                <p class="text-muted mb-0">{{ __('JPG/PNG, Max 500Kb') }}</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.store', ['id' => $profile->user_id]) }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Nama Himpunan') }}</label>
                                        <input class="form-control" type="text" id="name" name="name"
                                            value="{{ $user->name }}" autofocus readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="handphone">{{ __('Nomor Telepon') }}</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">ID (+62)</span>
                                            <input type="text" id="handphone" name="handphone" class="form-control"
                                                placeholder="81234567891" value="{{ $profile->handphone }}" />
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                        <input class="form-control" type="text" id="email" name="email"
                                            value="{{ $profile->email }}" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Nickname') }}</label>
                                        <input class="form-control" type="text" id="nickname" name="nickname"
                                            value="{{ $profile->nickname_himpunan }}" />
                                        <small id="nickname-validation" class="d-none" style="color:red;">Nickname tidak dapat lebih dari 8 karakter</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('Biografi') }}</label>
                                        <textarea class="form-control" name="bioHimpunan" id="bioHimpunan" rows="3" value="{{ $profile->bio_himpunan }}">{{ $profile->bio_himpunan }}</textarea>
                                        <small id="bio-validation" class="d-none" style="color:red;">Bio tidak dapat lebih dari 255 karakter</small>
                                        <small id="bio-max">Maksimal 255 karakter</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <a class="btn btn-info text-white" id="addSocial">
                                        <i class='bx bx-plus-circle'></i>
                                            Media sosial
                                    </a>
                                </div>
                            </div>
                            @php
                                $platforms = [
                                    'Instagram',
                                    'Facebook',
                                    'Google',
                                    'Twitter',
                                    'Youtube',
                                    'Discord',
                                    'LinkedIn',
                                ]
                            @endphp
                             
                            @if(!empty($socials))
                                @foreach($socials as $social)
                                <div class="row mt-2" id="platform">
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label class="form-label" for="platformName">{{ __('Nama platform') }}</label>
                                            <div class="input-group input-group-merge">
                                                    
                                                <select class="form-control" name="platformNameUpdate[]" required id="platformName">
                                                    @php
                                                        if (($key = array_search($social->social_name, $platforms)) !== false) {
                                                            unset($platforms[$key]);
                                                        }
                                                    @endphp
                                                    <option value="{{ $social->social_name }}" selected>{{ $social->social_name }}</option>
                                                    @foreach($platforms as $platform)
                                                        <option class="form-control" value="{{ $platform }}">{{ $platform }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label class="form-label" for="linkPlatform">{{ __('Link platform') }}</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="linkPlatform" name="linkPlatformUpdate[]" class="form-control"
                                                    value="{{ $social->social_link }}" required/>
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{ $social->id }}" name="socialId[]">
                                    </div>
                                    <div class="col-2" style="align-self: center;">
                                        <a id="removeRow" onclick="deleteRow(this)" style="display: flex; justify-content:center;">
                                            <i class='bx bxs-minus-circle' style="font-size: 2rem;"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            <div class="mt-4" id="platformForm">
                            </div>
                            <div class="mt-2 float-end">
                                <button type="submit" class="btn btn-primary me-2 " id="submit">{{ __('Save changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        var count = 0;
        $('#addSocial').on('click', function(e) {
            count += 1;
            if(count > 7) {
                iziToast.show({
                    title: "Error",
                    position: 'topCenter',
                    color: 'red',
                    message: 'Maksimal 7 sosial media'
                });
                return;
            }
            var html = `<div class="row" id="platform">
                            <div class="col-5">
                                <div class="mb-3">
                                    <label class="form-label" for="platformName">{{ __('Nama platform') }}</label>
                                    <div class="input-group input-group-merge">

                                        <select class="form-control" name="platformName[]" required id="platformName">
                                            <option value="" selected disabled>Pilih platform</option>
                                            @foreach($platforms as $platform)
                                                <option class="form-control" value="{{ $platform }}">{{ $platform }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="mb-3">
                                    <label class="form-label" for="linkPlatform">{{ __('Link platform') }}</label>
                                    <div class="input-group input-group-merge">
                                        <input type="url" id="linkPlatform" name="linkPlatform[]" class="form-control"
                                            value="https://" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2" style="align-self: center;">
                                <a id="removeRow" onclick="deleteRow(this)" style="display: flex; justify-content:center;">
                                    <i class='bx bxs-minus-circle' style="font-size: 2rem;"></i>
                                </a>
                            </div>
                        </div>`;
            $('#platformForm').append(html);
        });

        function deleteRow(el) {
            $(el).parent().parent().remove();
        }

        $( "#bioHimpunan" ).on( "keyup", function(e) {
            if($(this).val().length >= 255) {
                $('#submit').prop('disabled', true);
                $('#bio-validation').removeClass('d-none')
                $('#bio-max').hide()

            } else {
                $('#submit').prop('disabled', false);
                $('#bio-validation').addClass('d-none')
                $('#bio-max').show()
            }
        });

        $( "#nickname" ).on( "keyup", function(e) {
            if($(this).val().length >= 8) {
                $('#submit').prop('disabled', true);
                $('#nickname-validation').removeClass('d-none')

            } else {
                $('#submit').prop('disabled', false);
                $('#nickname-validation').addClass('d-none')
            }
        });

        $(document).on('click', '#change_img', function() {
            $('#profile_img').click();
        });

        $('#profile_img').ijaboCropTool({
            preview: '',
            setRatio: 1,
            allowedExtensions: ['jpg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            withCSRF: ['_token', '{{ csrf_token() }}'],
            processUrl: '{{ route('update.image') }}',

            onSuccess: function(res) {
                iziToast.show({
                    title: "Sukses",
                    position: 'topCenter',
                    color: 'green',
                    message: 'Berhasil upload foto'
                });
                setTimeout(() => {
                    window.location.href = "/profile"
                }, 3000);
            },
            onError: function(res) {
                iziToast.show({
                    title: "Error",
                    position: 'topCenter',
                    color: 'red',
                    message: 'Gagal upload foto'
                });
                setTimeout(() => {
                    window.location.href = "/profile"
                }, 3000);
            }
        });

        $(document).on('click', '#reset', function() {
            $.ajax({
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                url: "{{ route('reset.image') }}",
                success: function(res) {
                    iziToast.show({
                        title: "Sukses",
                        position: 'topCenter',
                        color: 'green',
                        message: 'Berhasil reset foto'
                    });
                    setTimeout(() => {
                        window.location.href = "/profile"
                    }, 3000);
                },
                error: function(res) {
                    iziToast.show({
                        title: "Error",
                        position: 'topCenter',
                        color: 'red',
                        message: 'Gagal reset foto'
                    });
                    setTimeout(() => {
                        window.location.href = "/profile"
                    }, 3000);
                }
            });
        });
    </script>
@endsection
