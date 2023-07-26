@extends('base-admin')

@section('event')
    active
@endsection

@section('main-content')
    <style>
        /* Style untuk modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1500;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            display: block;
            margin: auto;
            max-width: 80%;
            max-height: 80%;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>

    <!-- Modal -->
    <div class="modal" id="previewModal">
        <span class="close">&times;</span>
        <div class="preview-poster mt-5">
            <img class="modal-content" id="fullImage" width="100%">
        </div>
    </div>


    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="d-flex" style="gap:1rem;">
                    <h4 style="align-self: center; margin:0;">
                        @if ($isEdit)
                            Edit
                        @endif Kegiatan {{ $event->name_activity }}
                    </h4>
                </div>
              
                <div class="d-flex" style="gap:1rem;">
                    @if ($isEdit)
                        <button id="save" href="{{ route('event.details', $event->id) }}"
                            class="btn btn-success">Save</button>
                        <a href="{{ route('event.details', $event->id) }}" class="btn btn-danger">Batal</a>
                    @else
                        <a href="{{ route('event.details', ['id' => $event->id, 'isEdit' => true]) }}"
                            class="btn btn-primary">Edit</a>
                        @if($event->status_activity == 'selesai')
                            <a class="btn btn-warning" href="{{route('regist.index', $event->id)}}">Lihat Data Registrasi</a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    @if (!$isEdit)
                    <div class="mb-4 d-flex align-items-center">
                        <span style="align-self: center;"
                            class="badge 
                            @if ($event->status_activity == 'berlangsung') bg-label-primary me-1
                            @elseif($event->status_activity == 'akan datang')
                            bg-label-warning me-1
                            @elseif($event->status_activity == 'selesai')
                            bg-label-success me-1 @endif">
                            {{ $event->status_activity }}
                        </span>
                        <span class="badge
                        @if($event->can_regist_by == 'umum') bg-label-info me-3 @else bg-label-danger me-3 @endif" >{{ $event->can_regist_by }}</span>         
                        <span class="icon-eye mr-2"></span> <span>{{ $event->view_count }}</span>          
                    </div>
                    @endif
                    @if ($isEdit)
                        <div class="row mb-4">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Status</label>
                                    <select class="form-control" id="status">
                                        <option value="akan datang"
                                            {{ $event->status_activity === 'akan datang' ? 'selected' : '' }}>AKAN DATANG
                                        </option>
                                        <option value="berlangsung"
                                            {{ $event->status_activity === 'berlangsung' ? 'selected' : '' }}>BERLANGSUNG
                                        </option>
                                        <option value="selesai"
                                            {{ $event->status_activity === 'selesai' ? 'selected' : '' }}>SELESAI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Atur Registrasi</label>
                                    <select class="form-control" id="regist">
                                        <option value="umum"
                                            {{ $event->can_regist_by === 'umum' ? 'selected' : '' }}>Umum
                                        </option>
                                        <option value="mahasiswa"
                                            {{ $event->can_regist_by === 'mahasiswa' ? 'selected' : '' }}>Mahasiswa
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row d-flex">
                        <label for="" class="form-label">Poster</label>
                        <div class="@if (!$isEdit) col-md-12 @else col-md-6 @endif d-flex"
                            style="gap:1rem;">
                            <div class="preview-poster"
                                style="width: @if (!$isEdit) 70%; @else 35%; @endif">
                                <img class="preview-image" width="100%"
                                    src="/assets/img/poster/{{ $profile->name_himpunan }}/{{ $event->img_activity }}"
                                    alt="">
                            </div>

                            @if ($isEdit)
                                <div class="form-group">
                                    <a id="upload_img" class="btn btn-info mb-2 text-white">Upload poster</a>
                                    <input type="text" value="{{ $event->img_activity }}" class="form-control"
                                        id="img_path" readonly>
                                    <input class="form-control" type="file" id="img_activity" name="img_activity"
                                        autofocus hidden />
                                </div>
                            @else
                                <input type="text" id="data-fetch" value="{{ $event->desc_activity }}" hidden>
                                <div id="output" style="text-align: justify; width: 100%;"></div>
                            @endif

                        </div>
                        @if ($isEdit)
                            <div class="col-md-6">
                                <label for="name" class="form-label">Deskripsi</label>
                                <textarea name="desc_activity" id="desc_activity" class="form-control" style="overflow: hidden;" required
                                    value="{{ $event->desc_activity }}">{{ $event->desc_activity }}</textarea>
                            </div>
                        @endif
                    </div>
                    <div class="row mt-4">
                        <input type="hidden" value="{{ $isEdit }}" id="isEdit">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name_activity" value="{{ $event->name_activity }}"
                                class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">Jenis</label>
                            <select class="form-control" id="type_activity">
                                <option value="seminar" {{ $event->type_activity === 'seminar' ? 'selected' : '' }}>Seminar
                                </option>
                                <option value="pelatihan" {{ $event->type_activity === 'pelatihan' ? 'selected' : '' }}>
                                    Pelatihan</option>
                                <option value="olahraga" {{ $event->type_activity === 'olahraga' ? 'selected' : '' }}>
                                    Olahraga</option>
                                <option value="pameran" {{ $event->type_activity === 'pameran' ? 'selected' : '' }}>Pameran
                                </option>
                                <option value="nasional" {{ $event->type_activity === 'nasional' ? 'selected' : '' }}>
                                    Nasional</option>
                                <option value="lainnya" {{ $event->type_activity === 'lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                        </div>
                        @if ($event->type_activity == 'lainnya')
                            <div class="col-md-4">
                                <label for="name" class="form-label">Jenis Lainnya</label>
                                <input type="text" id="other_type" value="{{ $event->other_type }}"
                                    class="form-control">
                            </div>
                        @endif
                        <div class="col-md-4 form-group" id="showOthers" style="display: none;">
                            <label for="others" class="form-label">{{ __('Jenis Lainnya') }}</label>
                            <input class="form-control" type="text" id="other_type" name="other_type" autofocus />
                        </div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label for="" class="form-label">Tempat Pelaksanaan</label>
                            <input type="text" class="form-control" id="place_activity"
                                value="{{ $event->place_activity }}">
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Terdapat Tiket?</label>
                            <select class="form-control" id="ticket">
                                <option value="yes" {{ $event->ticket == 'yes' ? 'selected' : '' }}>Ya</option>
                                <option value="no" {{ $event->ticket == 'no' ? 'selected' : '' }}>Tidak</option>
                              </select>
                              
                        </div>
                        <div class="col-md-4">
                            <label for="" class="form-label">Harga Tiket</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">Rp.</span>
                                <input style="text-indent: 1rem;" type="number" class="form-control" id="ticket_price"
                                    value="{{ $event->price_ticket }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="" class="form-label">Nama Penanggung Jawab</label>
                            <input type="text" class="form-control" id="pic_name" value="{{ $event->name_pic }}">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Nomor Telepon</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">ID (+62)</span>
                                <input style="text-indent: 1rem;" type="number" class="form-control" id="pic_num"
                                    value="{{ $event->contact_pic }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <label for="name" class="form-label">Tanggal</label>
                            <input type="date" id="date_activity" class="form-control"
                                value="{{ $event->date_activity }}">
                        </div>
                        <div class="col-md-3">
                            <label for="name" class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="time_start"
                                value="{{ $event->time_start_activity }}">
                        </div>
                        <div class="col-md-3">
                            <label for="name" class="form-label">Waktu Selesai</label>
                            <input type="time" class="form-control" id="time_end"
                                value="{{ $event->time_end_activity }}">
                        </div>
                        <div class="col-md-3">
                            <button type="button" style="margin-top:1.8rem;" class="btn btn-info d-grid w-100"
                                id="checkTime">
                                Cek
                            </button>
                            <div id="validate-time"
                                style="display:none; justify-content: end;
                            color: red;
                            font-size: 11px;"
                                class="col-md-12">
                                Tolong isi waktu mulai dan waktu selesai dengan benar
                            </div>
                            <div id="validate-success"
                                style="display:none; justify-content: end;
                            color: green;
                            font-size: 11px;">
                                Waktu telah sesuai
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        $('#upload_img').click(function() {
            $('input#img_activity').click();
        });

        $('#img_activity').change(function() {
            let img = $(this).val().replace("C:", '').replace('fakepath', '').replace('\\\\', '');
            $('#img_path').val(img);
            console.log($(this).prop('files')[0]);
            var file = this.files[0];

            var reader = new FileReader();
            reader.onload = function(event) {
                $(".preview-image").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        });

        $("#type_activity").change(function() {
            if ($(this).val() == 'lainnya') {
                $("#showOthers").show();
                $("#other_type").attr('required', true);
            } else {
                $("#showOthers").hide();
            }

        });
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
                    editor.getContainer().style.boxShadow =
                        "0 0 0 .2rem rgba(0, 123, 255, .25)",
                        editor.getContainer().style.borderColor = "#80bdff"
                });
                editor.on('blur', () => {
                    editor.getContainer().style.boxShadow = "",
                        editor.getContainer().style.borderColor = ""
                });
            }
        });

        $('#checkTime').click(function() {
            var start = $('#time_start').val();
            var end = $('#time_end').val();
            if (end < start) {
                $('#validate-time').show().css({
                    "display": "flex"
                });
                $('#save').prop('disabled', true);
            } else {
                $('#validate-success').show().css({
                    "display": "flex"
                });
                setTimeout(() => {
                    $('#validate-success').hide();
                }, 2000);
                $('#validate-time').hide();
                $('#save').prop('disabled', false);
            }
        });

        $(document).ready(function() {
            const text = $('#data-fetch').val();
            const output = document.getElementById('output');
            output.innerHTML = text;

            let isEdit = $('#isEdit').val();
            if (!isEdit) {
                $(':input').prop('disabled', true);
            }

            $(".preview-image").on("click", function() {
                $("#fullImage").attr("src", $(this).attr("src"));
                $("#previewModal").css("display", "block");
            });

            // Saat tombol "close" di klik, sembunyikan modal
            $(".close").on("click", function() {
                $("#previewModal").css("display", "none");
            });
        });

        $('#save').click(function(e) {
            var start = $('#time_start').val();
            var end = $('#time_end').val();
            if (end < start) {
                iziToast.show({
                    title: "Error",
                    position: 'topLeft',
                    message: "Mohon isi waktu mulai dan waktu selesai dengan benar.",
                    color: 'red'
                })
                return;
            }
            tinymce.triggerSave();
            e.preventDefault();
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var tinyRichText = (((tinyMCE.get('desc_activity').getContent()).replace(/(&nbsp;)*/g, ""))
                .replace(/(<p>)*/g, "")).replace(/<(\/)?p[^>]*>/g, "");
            var fd = new FormData();
            fd.append("_token", CSRF_TOKEN);
            fd.append('name_activity', $('#name_activity').val());
            fd.append('desc_activity', tinyRichText);
            fd.append('date_activity', $('#date_activity').val());
            fd.append('type_activity', $('#type_activity').find('option:selected').val());
            fd.append('img_activity', $('input#img_activity').prop('files')[0]);
            fd.append('other_type', $('#other_type').val())
            fd.append('file_name', $('#img_path').val())
            fd.append('name_activity', $('#name_activity').val())
            fd.append('ticket', $('#ticket').val())
            fd.append('price_ticket', $('#ticket_price').val())
            fd.append('name_pic', $('#pic_name').val())
            fd.append('contact_pic', $('#pic_num').val())
            fd.append('time_start_activity', $('#time_start').val())
            fd.append('time_end_activity', $('#time_end').val())
            fd.append('place_activity', $('#place_activity').val())
            fd.append('idEventEdit', {{ $event->id }})
            fd.append('status', $('#status').val())
            fd.append('can_regist_by', $('#regist').val())

            $.ajax({
                url: '/update-event',
                type: "post",
                data: fd,
                cache: false,
                contentType: false, //tell jquery to avoid some checks
                processData: false,
                success: function(res) {
                    iziToast.show({
                        title: "Sukses",
                        position: 'topLeft',
                        message: 'Berhasil edit event',
                        color: 'green'
                    })
                    var customUrl = '/event-data/'+{{ $event->id }};
                    setTimeout(() => {
                        window.location.href = customUrl;
                    }, 2000);
                },
                error: function(res) {
                    iziToast.show({
                        title: "Error",
                        position: 'topLeft',
                        message: "Tolong isi semua field dengan benar",
                        color: 'red'
                    })
                }
            });
        });
    </script>
@endsection
