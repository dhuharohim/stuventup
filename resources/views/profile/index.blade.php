@extends('base-admin')

@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-sm-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('profile.index') }}"><i class="bx bx-user me-1"></i> Profil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('setting.index') }}"
                        ><i class="bx bx-bell me-1"></i> Setting</a
                      >
                    </li>
                  </ul>
                <div class="card">
                    <h4 class="fw-bold p-4" style="padding-bottom: 0.05rem !important;"><span class="text-muted fw-light">Setting Profile / </span>
                        {{ $user->name }}</h4>

                    {{-- <h5 class="card-header">Profile Details</h5> --}}
                    <hr class="my-0" />
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            {{-- <img src="/assets/img/himpunan/himakom.jpeg" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar" /> --}}
                                <img alt="image" src="/assets/img/profile/{{ $profile['photo'] =='' ? 'default.png' : $profile['photo'] }}" class="d-block rounded"
                                height="100" width="100"/>
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-2" tabindex="0">
                                    <a href="javascript:void(0)" class="d-none d-sm-block" id="change_img" style="color:white">Ubah foto</a>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="profile_img" id="profile_img" class="account-file-input" hidden/>
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-2" id="reset">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">{{ __('Reset') }}</span>
                                </button>

                                <p class="text-muted mb-0">{{ __('JPG/PNG, Max 500Kb') }}</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.store', ['id'=>$profile->user_id]) }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">{{ __('Nama Himpunan') }}</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $user->name }}" autofocus readonly />
                                </div>
                          
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ $profile->email }}" />
                                </div>
                           
                               
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="handphone">{{ __('Nomor Telepon') }}</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">ID (+62)</span>
                                        <input type="text" id="handphone" name="handphone" class="form-control"
                                            placeholder="81234567891" value="{{ $profile->handphone }}"/>
                                    </div>
                                </div>
                                {{-- <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">{{ __('Status Pembayaran') }}</label>
                                    <input class="form-control" type="text" id="status" name="status"
                                        value="{{ $profile->billing_status }}" readonly />
                                    @if($profile->billing_status == "Belum Bayar")
                                    <a href="" class=" text-sm p-1 mt-lg-2">{{ __('Konfirmasi pembayaran anda sekarang') }}</a>
                                    @else
                                    <p></p>
                                    @endif
                                </div>   --}}
                            </div>
                            <div class="mt-2 float-end">
                                <button type="submit" class="btn btn-primary me-2 ">{{ __('Save changes') }}</button>
                           
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
<script>
        $(document).on('click','#change_img', function(){
            $('#profile_img').click();
        });

        $('#profile_img').ijaboCropTool({
          preview : '',
          setRatio:1,
          allowedExtensions: ['jpg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          withCSRF:['_token','{{ csrf_token() }}'],
          processUrl:'{{ route("update.image") }}',
        
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
             alert(message);
          }
       });

       $(document).on('click','#reset', function(){
            $.ajax({
                type: 'POST',
                data: {
                        "_token": "{{ csrf_token() }}",
                },
                url: "{{ route('reset.image') }}"
            });
        });
</script>
@endsection
