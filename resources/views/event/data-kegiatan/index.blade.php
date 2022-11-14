@extends('base-admin')

@section('event')
    active
@endsection
@section('custom_css')
    <style>
        .offcanvas-end {
            width: 600px !important;
        }
    </style>
@endsection

@section('main-content')
    <!-- Layout wrapper -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @foreach ($todayEvent as $nowEvent)
                <div class="col-md-6">
                    @if ($nowEvent->date_activity == $today &&
                        strtotime($nowEvent->time_end_activity) < time() &&
                        $nowEvent->status_activity == 'berlangsung')
                        <div class="card text-white mb-4">
                            <div class="card-header bg-success"
                                style="height: 1rem;
                            display: flex;
                            align-items: center;
                            font-weight:bold;">
                                Notifikasi
                            </div>
                            <div class="card-body text-black"
                                style="display: flex;
                            justify-content: space-between;
                            padding: 1rem;
                            align-items: center;">
                                <div style="width: 70%">
                                    Acara <span style="font-weight: bold">{{ $nowEvent->name_activity }} </span> telah
                                    selesai
                                </div>
                                <form>
                                    @csrf
                                    <input type="hidden" name="id" id="confirm" value="{{ $nowEvent->id }}">
                                    <button type="submit" class="btn btn-outline-success"
                                        id="confirmNow">Konfirmasi</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach


        </div>

        <div class="card">
            <div class="card-header">
                <h4>Data Kegiatan</h4>
            </div>
            <div class="table-responsive text-nowrap" style="line-height: 3rem">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Tempat</th>
                            <th>Jenis</th>
                            <th>Person In Charge</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (sizeof($dataEvent) != 0)
                            @foreach ($dataEvent as $event)
                                <tr>
                                    <td>{{ $event->name_activity }}</td>
                                    <td>{{ date('d F Y', strtotime($event->date_activity)) }}</td>
                                    <td>{{ date('H:i', strtotime($event->time_start_activity)) }}</td>
                                    @if ($event->time_end_activity == null)
                                        <td> Tidak ditentukan </td>
                                    @else
                                        <td>{{ date('H:i', strtotime($event->time_end_activity)) }}</td>
                                    @endif
                                    <td>{{ $event->place_activity }}</td>
                                    @if ($event->type_activity == 'lainnya')
                                        <td style="text-transform:capitalize;">{{ $event->type_activity }} :
                                            {{ $event->other_type }}</td>
                                    @else
                                        <td style="text-transform:capitalize;">{{ $event->type_activity }}</td>
                                    @endif
                                    <td style="font-weight:bold">{{ $event->name_pic }}</td>

                                    <td>
                                        <span
                                            class="badge 
                                        @if ($event->status_activity == 'berlangsung') bg-label-primary me-1
                                        @elseif($event->status_activity == 'akan datang')
                                        bg-label-warning me-1
                                        @elseif($event->status_activity == 'selesai')
                                        bg-label-success me-1 @endif">
                                            {{ $event->status_activity }}
                                        </span>
                                    </td>

                                    <td>
                                        <button class="btn btn-icon rounded-pill dropdown-toggle hide-arrow"
                                            data-toggle="dropdown" id="dropdownMenu" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class='bx bx-dots-vertical-rounded'></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end px-4" aria-labelledby="dropdownMenu">
                                            @php
                                                $eventEdit = $eventForm::where('id', $event->id)->first();
                                            @endphp
                                            <li><a id="showEventDrawer" data-edit="{{ $eventEdit->id }}"
                                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd"
                                                    style="cursor: pointer; color: green">Edit</a></li>
                                            <li><a href="#">Data Registrasi</a></li>
                                            <li><a href="#">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" style="text-align: center">Tidak ada data.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div style="padding: 0.5rem 1rem;">
                    {{ $dataEvent->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel"
        style="visibility: visible;" aria-modal="true" role="dialog" >
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Edit Event</h5>
            
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
            <div class="">
                <form id="eventForm" class="form-group">
                    <div class="row">
                        <div class="mb-4 col-md-12 form-group">
                                <input type="text" name="idEvent" id="idEvent" value="">
                            <label for="name" class="form-label">{{ __('Nama Kegiatan') }}</label>
                            <input class="form-control" type="text" id="name_activity" name="name_activity" autofocus
                                required />
                        </div>
                        <div class="mb-4 col-md-12 form-group">
                            <label for="desc" class="form-label">{{ __('Deskripsi Kegiatan') }}</label>
                            <textarea name="desc_activity" id="desc_activity" class="form-control" onkeyup="adjust(this)" style="overflow: hidden;"
                                required></textarea>
                        </div>
                        <div class="mb-4 col-md-6 form-group">
                            <label for="date" class="form-label">{{ __('Tanggal Kegiatan') }}</label>
                            <input class="form-control" type="date" id="date_activity" name="date_activity"
                                min="{{ $today }}" required autofocus />
                        </div>
                        <div class="mb-4 col-md-3 form-group">
                            <label for="time-start" class="form-label">{{ __('Waktu Mulai') }}</label>
                            <input class="form-control" type="time" id="time_start_activity" name="time_start_activity"
                                required autofocus />
                        </div>
                        <div class="mb-4 col-md-3 form-group">
                            <label for="time-end" class="form-label">{{ __('Waktu Selesai') }}</label>
                            <input class="form-control" type="time" id="time_end_activity" name="time_end_activity"
                                required autofocus />
                        </div>
                        <div class="mb-4 col-md-6 form-group">
                            <label for="type" class="form-label">{{ __('Jenis Kegiatan') }}</label>
                            <select name="type_activity" class="form-control text-capitalize" id="type" required>
                                @php
                                    $typeActivity = ['seminar', 'pelatihan', 'olahraga', 'pameran', 'nasional', 'lainnya'];
                                @endphp

                                <option value="" class="form-control" selected disabled>Pilih kegiatan</option>

                                @foreach ($typeActivity as $type)
                                    <option value="{{ $type }}" class="form-control">{{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 col-md-6 form-group" id="showOthers" style="display: none;">
                            <label for="others" class="form-label">{{ __('Jenis Kegiatan Lainnya') }}</label>
                            <input class="form-control" type="text" id="other_type" name="other_type" autofocus />
                        </div>
                        <div class="mb-4 col-md-12 form-group">
                            <label for="place" class="form-label">{{ __('Tempat Kegiatan') }}</label>
                            <input class="form-control" type="text" id="place_activity" name="place_activity"
                                autofocus required />
                        </div>
                        <div class="mb-4 col-md-12 form-group">
                            <label for="img" class="form-label">{{ __('Poster/Flyer Kegiatan') }}</label>
                            <input class="form-control" type="file" id="img_activity" name="img_activity"
                                autofocus />
                        </div>
                        <div class="mb-4 col-md-6 form-group">
                            <label for="ticket" class="form-label">{{ __('Apakah terdapat tiket?') }}</label>
                            <select name="ticket" class="form-control" id="isTicket">
                                <option value=""selected disabled></option>
                                <option value="yes">Ya</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div class="mb-4 col-md-6 form-group" id="showTicket" style="display: none;">
                            <label for="price" class="form-label">{{ __('Harga tiket') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">Rp.</span>
                                <input class="form-control" type="number" id="price_ticket" name="price_ticket"
                                    autofocus />
                            </div>
                        </div>
                        <div class="mb-4 col-md-12 form-group">
                            <label for="name-pic" class="form-label">{{ __('Nama Penanggung Jawab') }}</label>
                            <input class="form-control" type="text" id="name_pic" name="name_pic" autofocus />
                        </div>
                        <div class="mb-4 col-md-12 form-group">
                            <label for="contact" class="form-label">{{ __('Kontak Penanggung Jawab') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">ID (+62)</span>
                                <input type="text" id="contact_pic" name="contact_pic" class="form-control"
                                    placeholder="81234567891" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success mb-2 d-grid w-100" id="save"
                            data-bs-dismiss="offcanvas">Save</button>
                        <button type="button" class="btn btn-outline-secondary d-grid w-100"
                            data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Layout wrapper -->
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {
            $('#confirmNow').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/update-status',
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': $('#confirm').val(),
                    },
                    success: function(res) {
                        iziToast.show({
                                title: "Sukses",
                                position: 'topCenter',
                                color: 'green',
                                message: 'Berhasil konfirmasi acara'
                            }),
                            setTimeout(() => {
                                window.location.href = "/event-data"
                            }, 3000);
                    },
                    error: function(res) {
                        iziToast.show({
                            title: "Error",
                            position: 'topCenter',
                            color: 'red',
                            message: "Gagal konfirmasi acara"
                        })
                    },
                });
            });
            $('#showEventDrawer').click(function(e){
                var eventId = $(this).data('edit');
                console.log(eventId);
                $('#idEvent').val(eventId);


            });
        });
        
    </script>
@endsection
