@extends('main-home.base-home')

@section('title-portal')
    Invoice - {{ $eventDetail->name_activity }}
@endsection

@section('content-portal')
    <div class="container" style="display: flex;
    place-content: center;">
        <div class="card d-flex justify-center text-center" style="padding: 1rem 4rem;">
            <div class="card-body">
                <div class="header">
                    <h4>
                        Invoice pembayaran {{ $eventDetail->name_activity }}
                    </h4>
                </div>
                <div class="data">
                    <div class="row">
                        <div class="col">
                            <p>{{ $date }}</p>
                        </div>
                    </div>
                    <div class="header" style="margin-top:2rem;">
                        <div class="text" style="text-align: left; display:flex;">
                            @if(!empty($profileMhs))
                            <strong style="margin-right: 4rem;">Pendaftar: </strong>
                            <p> {{ $user->name }}</p>
                            (<p>{{ $profileMhs->study_program }}</p>)
                            @else
                            <strong style="margin-right: 1rem;">Pendaftar: </strong>
                            <p> {{ $user->name }}</p>
                            @endif
                        </div>
                        <div class="author" style="text-align: left; display:flex;">
                            <strong style="margin-right: 1.9rem;">Penyelenggara: </strong>
                            <p>{{ $eventDetail->profile->name_himpunan }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body d-flex" style="justify-content: center; align-items:center;">
                            <p style="font-size: 2rem;">Rp. {{ $eventDetail->price_ticket }}</p>
                        </div>
                        <a style="border-radius: inherit;" class="btn btn-primary" href="https://wa.me/+62{{ $eventDetail->contact_pic }}">Hubungi kontak Penyelenggara ({{ $eventDetail->name_pic }})</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection