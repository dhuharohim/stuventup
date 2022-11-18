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
                        $nowEvent->status_activity == 'berlangsung' &&
                        sizeof($dataEvent) != 0)
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
                    @elseif ($nowEvent->date_activity == $today &&
                        strtotime($nowEvent->time_start_activity) > time() &&
                        $nowEvent->status_activity == 'berlangsung' &&
                        $nowEvent->time_end_activity == null &&
                        sizeof($dataEvent) != 0)
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
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th>Jenis</th>
                            <th>PIC</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (sizeof($dataEvent) != 0)
                            @foreach ($dataEvent as $event)
                                <tr>
                                    <input type="hidden" name="idEvent" id="idEvent" value="{{$event->id}}">
                                    <td>{{ $event->name_activity }}</td>
                                    <td>{{ date('d M Y', strtotime($event->date_activity)) }}</td>
                                    <td>{{ date('H:i', strtotime($event->time_start_activity)) }} -
                                        @if ($event->time_end_activity == null)
                                            Selesai
                                        @else
                                            {{ date('H:i', strtotime($event->time_end_activity)) }}
                                    </td>
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
                                <button class="btn btn-icon rounded-pill dropdown-toggle hide-arrow" data-toggle="dropdown"
                                    id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bx-dots-vertical-rounded'></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end px-4" aria-labelledby="dropdownMenu">

                                    <li><a class="showEventDrawer" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasEnd-{{ $event->id }}"
                                            style="cursor: pointer; color: green">Edit</a></li>
                                    <li><a href="{{route('regist.index')}}">Data Registrasi</a></li>
                                    <li><a id="deleteEvent" style="cursor: pointer;">Delete</a></li>
                                </ul>
                            </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" style="text-align: center">Tidak ada data.</td>
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
    @foreach ($dataEvent as $events)
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd-{{ $events->id }}"
            aria-labelledby="offcanvasEndLabel" style="visibility: visible;" aria-modal="true" role="dialog">
            <div class="offcanvas-header">
                <h5 id="offcanvasEndLabel" class="offcanvas-title">Edit Event</h5>

                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                <div class="">
                    <form id="eventForm" class="form-group">
                        <div class="row">
                            <div class="mb-4 col-md-12 form-group">
                                <input type="text" name="idEventEdit" id="idEventEdit" value="{{ $events->id }}">
                                <label for="name" class="form-label">{{ __('Nama Kegiatan') }}</label>
                                <input class="form-control" type="text" id="name_activity" name="name_activity" autofocus
                                    required value="{{ $events->name_activity }}" />
                            </div>
                            <div class="mb-4 col-md-12 form-group">
                                <label for="desc" class="form-label">{{ __('Deskripsi Kegiatan') }}</label>
                                <textarea name="desc_activity" id="desc_activity" class="form-control" style="overflow: hidden;" required
                                    value="{{ $events->desc_activity }}">{{ $events->desc_activity }}</textarea>
                            </div>
                            <div class="mb-4 col-md-6 form-group">
                                <label for="date" class="form-label">{{ __('Tanggal Kegiatan') }}</label>
                                <input class="form-control" type="date" id="date_activity" name="date_activity"
                                    min="{{ $today }}" required autofocus value="{{ $events->date_activity }}" />
                            </div>
                            <div class="mb-4 col-md-3 form-group">
                                <label for="time-start" class="form-label">{{ __('Waktu Mulai') }}</label>
                                <input class="form-control" type="time" id="time_start_activity"
                                    name="time_start_activity" required autofocus
                                    value="{{ $events->time_start_activity }}" />
                            </div>
                            <div class="mb-4 col-md-3 form-group">
                                <label for="time-end" class="form-label">{{ __('Waktu Selesai') }}</label>
                                <input class="form-control" type="time" id="time_end_activity"
                                    name="time_end_activity" required autofocus
                                    value="{{ $events->time_end_activity }}" />
                            </div>
                            <div class="mb-4 col-md-6 form-group">
                                <label for="type" class="form-label">{{ __('Jenis Kegiatan') }}</label>
                                <select name="type_activity" class="form-control text-capitalize" id="type"
                                    required>
                                    <option value="{{ $events->type_activity }}" class="form-control" selected disabled>
                                        {{ $events->type_activity }}
                                    </option>
                                    @php
                                        $typeActivity = ['seminar', 'pelatihan', 'olahraga', 'pameran', 'nasional', 'lainnya'];
                                    @endphp
                                    @foreach ($typeActivity as $type)
                                        <option value="{{ $type }}" class="form-control">{{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($events->other_type != null)
                                <div class="mb-4 col-md-6 form-group" id="showOthers">
                                    <label for="others" class="form-label">{{ __('Jenis Kegiatan Lainnya') }}</label>
                                    <input class="form-control" type="text" id="other_type" name="other_type"
                                        autofocus value="{{ $events->other_type }}" />
                                </div>
                            @elseif($events->other_type == null)
                                <div class="mb-4 col-md-6 form-group" id="showOthers1" style="display: none;">
                                    <label for="others" class="form-label">{{ __('Jenis Kegiatan Lainnya') }}</label>
                                    <input class="form-control" type="text" id="other_type" name="other_type"
                                        autofocus value="" />
                                </div>
                            @endif
                            <div class="mb-4 col-md-12 form-group">
                                <label for="place" class="form-label">{{ __('Tempat Kegiatan') }}</label>
                                <input class="form-control" type="text" id="place_activity" name="place_activity"
                                    autofocus required value="{{ $events->place_activity }}" />
                            </div>
                            <div class="mb-4 col-md-12 form-group">
                                <label for="img" class="form-label">{{ __('Poster/Flyer Kegiatan') }}</label>
                                <input class="form-control" type="file" id="img_activity" name="img_activity"
                                    autofocus value="{{ $events->img_activity }}" />
                            </div>
                            <div class="mb-4 col-md-6 form-group">
                                <label for="ticket" class="form-label">{{ __('Apakah terdapat tiket?') }}</label>
                                <select name="ticket" class="form-control" id="isTicket">
                                    @if ($events->ticket == 'yes')
                                        <option value="yes" selected disabled id="ticket">
                                            Ya</option>
                                    @else
                                        <option value="no" selected disabled id="ticket">
                                            Tidak</option>
                                    @endif
                                    <option value="yes">Ya</option>
                                    <option value="no">Tidak</option>
                                </select>
                            </div>
                            @if ($events->ticket == 'yes')
                                <div class="mb-4 col-md-6 form-group" id="showTicket">
                                    <label for="price" class="form-label">{{ __('Harga tiket') }}</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">Rp.</span>
                                        <input class="form-control" type="number" id="price_ticket" name="price_ticket"
                                            autofocus value="{{ $events->price_ticket }}" />
                                    </div>
                                </div>
                            @elseif($events->ticket == 'no')
                                <div class="mb-4 col-md-6 form-group" id="showTicket1" style="display: none;">
                                    <label for="price" class="form-label">{{ __('Harga tiket') }}</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">Rp.</span>
                                        <input class="form-control" type="number" id="price_ticket" name="price_ticket"
                                            autofocus value="" />
                                    </div>
                                </div>
                            @endif
                            <div class="mb-4 col-md-12 form-group">
                                <label for="name-pic" class="form-label">{{ __('Nama Penanggung Jawab') }}</label>
                                <input class="form-control" type="text" id="name_pic" name="name_pic" autofocus
                                    value="{{ $events->name_pic }}" />
                            </div>
                            <div class="mb-4 col-md-12 form-group">
                                <label for="contact" class="form-label">{{ __('Kontak Penanggung Jawab') }}</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">ID (+62)</span>
                                    <input type="text" id="contact_pic" name="contact_pic" class="form-control"
                                        placeholder="81234567891" value="{{ $events->contact_pic }}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button name="button" class="btn btn-success mb-2 d-grid w-100" id="saveEdit"
                                data-bs-dismiss="offcanvas">Save</button>
                            <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                data-bs-dismiss="offcanvas">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <!-- / Layout wrapper -->
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {
            console.log('test')
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
            //activity types
            $("select#type").on('change', function() {
                if ($(this).find('option:selected').val() == 'lainnya') {
                    $("#showOthers1").show();
                    $("#other_type").attr('required', true);
                } else {
                    $("#showOthers1").hide();
                }

            });
            $("select#isTicket").on('change', function() {
                if ($(this).find('option:selected').val() == 'yes') {
                    $("#showTicket1").show();
                    $("#price_ticket").attr('required', true);
                } else {
                    $("#showTicket1").hide();
                }

            });
            // $("#desc_activity").change(function() {
            //     var s = $(this).val();
            //     console.log(s);
            //     tinymce.get("desc_activity").getContent(s);
            // });

            $('#saveEdit').click(function(e) {
                tinymce.triggerSave();
                e.preventDefault();
                var tinyRichText = (((tinyMCE.get('desc_activity').getContent()).replace(/(&nbsp;)*/g, ""))
                    .replace(/(<p>)*/g, "")).replace(/<(\/)?p[^>]*>/g, "");
                $.ajax({
                    url: '/update-event',
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'idEventEdit': $('#idEventEdit').val(),
                        'name_activity': $('#name_activity').val(),
                        'desc_activity': tinyRichText,
                        'date_activity': $('#date_activity').val(),
                        'type_activity': $('#type').find('option:selected').val(),
                        'other_type': $('#other_type').val(),
                        'img_activity': $('#img_activity').val(),
                        'name_activity': $('#name_activity').val(),
                        'ticket': $('#isTicket').find('option:selected').val(),
                        'price_ticket': $('#price_ticket').val(),
                        'name_pic': $('#name_pic').val(),
                        'contact_pic': $('#contact_pic').val(),
                        'time_start_activity': $('#time_start_activity').val(),
                        'time_end_activity': $('#time_end_activity').val(),
                        'place_activity': $('#place_activity').val(),
                    },
                    success: function(res) {
                        $('#eventForm').trigger('reset');
                        iziToast.show({
                            title: "Sukses",
                            position: 'topLeft',
                            message: 'Berhasil edit event',
                            color: 'green'
                        })

                        setTimeout(() => {
                            window.location.href = "/event-data"
                        }, 3000);
                    },
                    error: function(res) {
                        iziToast.show({
                            title: "Error",
                            position: 'topLeft',
                            message: "Gagal",
                            color: 'red'
                        })
                    }
                });
            });

            $('#deleteEvent').click(function(e){
                $.ajax({
                    url: 'delete-event',
                    type: 'post',
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "id": $('#idEvent').val()

                    },
                    success: function(res) {
                        iziToast.show({
                            title: "Sukses",
                            position: 'topLeft',
                            message: 'Berhasil delete event',
                            color: 'green'
                        })

                        setTimeout(() => {
                            window.location.href = "/event-data"
                        }, 3000);
                    },
                    error: function(res) {
                        iziToast.show({
                            title: "Error",
                            position: 'topLeft',
                            message: "Gagal",
                            color: 'red'
                        })
                    }
                })
            });

        });
    </script>
    <script>
        tinymce.init({
            selector: '#desc_activity',
            menubar: false,
            statusbar: false,
            plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
            skin: 'bootstrap',
            toolbar_drawer: 'floating',
            min_height: 200,
            autoresize_bottom_margin: 16,
            setup: (editor) => {
                editor.on('init', () => {
                    editor.getContainer().style.transition =
                        "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
                });
                editor.on('focus', () => {
                    editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)",
                        editor.getContainer().style.borderColor = "#80bdff"
                });
                editor.on('blur', () => {
                    editor.getContainer().style.boxShadow = "",
                        editor.getContainer().style.borderColor = ""
                });
            }
        });
    </script>
@endsection
