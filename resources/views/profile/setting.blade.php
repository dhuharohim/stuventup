@extends('base-admin')

@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills  flex-sm-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link " href="{{ route('profile.index') }}"><i class="bx bx-user me-1"></i> Profil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('setting.index') }}"
                        ><i class="bx bx-bell me-1"></i> Setting</a
                      >
                    </li>
                  </ul>
                <div class="card">
                    <h4 class="fw-bold p-4" style="padding-bottom: 0.05rem !important;"><span class="text-muted fw-light">Setting Akun / </span>
                        {{ $user->name }}</h4>

                    {{-- <h5 class="card-header">Profile Details</h5> --}}
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                        <form method="POST" action="{{ route('setting.store', ['id'=>$user->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">{{ __('Username') }}</label>
                                    <input class="form-control" type="text" id="username" name="username"
                                        value="{{ $user->username }}" autofocus readonly />
                                </div>
                          
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">{{ __('Password') }}</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        value="{{ $user->password }}" />
                                </div>
                           
                               
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
     
</script>
@endsection
