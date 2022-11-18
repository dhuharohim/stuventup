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
            <div class="col">
                <a style="cursor: pointer;color: inherit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="text">
                                    Buat event
                                </div>
                                <div class="icon">
                                    <i class='bx bxs-add-to-queue'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col">
                <a style="cursor: pointer;color: inherit" href="{{ route('event.data') }}">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="text">
                                    Data event
                                </div>
                                <div class="icon">
                                    <i class='bx bxs-data'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <a href="" style="color: inherit">
                            <div class="d-flex justify-content-between">
                                <div class="text">
                                    Merchandise
                                </div>
                                <div class="icon">
                                    <i class='bx bxs-shopping-bags'></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <a href="" style="color: inherit">
                            <div class="d-flex justify-content-between">
                                <div class="text">
                                    Broadcast
                                </div>
                                <div class="icon">
                                    <i class='bx bx-broadcast'></i>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- <div class="modal" id="uploadPoster" role="dialog" aria-labelledby="exampleModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Poster/Flyer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="img" class="form-label">{{ __('Poster/Flyer Kegiatan') }}</label>
                        <br>
                        <a class="btn btn-info text-white" id="upload_img" style="cursor: pointer;">Upload gambar</a>
                        <input class="form-control" type="file" id="img_activity" name="img_activity" autofocus
                            hidden />
                    </div>
    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel"
        style="visibility: visible;" aria-modal="true" role="dialog">
        <div class="offcanvas-header">
            <h5 id="offcanvasEndLabel" class="offcanvas-title">Form Buat Event</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
            <div class="">
                <form id="eventForm" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-4 col-md-12 form-group">
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
                                    <option value="{{ $type }}" class="form-control">{{ $type }}</option>
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
                        <div class="mb-4 col-md-6 form-group">
                            <label for="img" class="form-label">{{ __('Poster/Flyer Kegiatan') }}</label>
                            <br>
                            <a class="btn btn-info text-white" id="upload_img" style="cursor: pointer;">Upload gambar</a>
                            <input class="form-control" type="file" id="img_activity" name="img_activity" autofocus
                                hidden />
                        </div>
                        <div class="mb-4 col-md-6 form-group" id="posterName" style="display: none;">
                            <input type="text" name="file_name" id="file_name" class="form-control"
                                style="margin-top: 1.7rem">
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
        // $('#img_activity').click(function){
        //     var img = $('#img_activity').val();
        //     console.log(img);
        //     $('#posterName').show();
        // }
        //activity types
        $("#type").change(function() {
            if ($(this).val() == 'lainnya') {
                $("#showOthers").show();
                $("#other_type").attr('required', true);
            } else {
                $("#showOthers").hide();
            }

        });

        //ticket
        $("#isTicket").change(function() {
            if ($(this).val() == 'yes') {
                $("#showTicket").show();
                $("#price_ticket").attr('required', true);
            } else {
                $("#showTicket").hide();
            }

        });
        $(document).ready(function() {
            $('#upload_img').click(function() {
                $('input#img_activity').click();
            });
            $('input#img_activity').change(function() {
                let img = $(this).val().replace("C:", '').replace('fakepath', '').replace('\\\\', '');
                $('#posterName').show();
                $('#file_name').val(img);

            });
            $('#save').click(function(e) {
                tinymce.triggerSave();
                e.preventDefault();
                var tinyRichText = (((tinyMCE.get('desc_activity').getContent()).replace(/(&nbsp;)*/g, ""))
                    .replace(/(<p>)*/g, "")).replace(/<(\/)?p[^>]*>/g, "");
                $.ajax({
                    url: '/event-store',
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'name_activity': $('#name_activity').val(),
                        'desc_activity': tinyRichText,
                        'date_activity': $('#date_activity').val(),
                        'type_activity': $('#type').find('option:selected').val(),
                        'img_activity': $('#img_activity').val(),
                        'other_type': $('#other_type').val(),
                        'file_name': $('#file_name').val(),
                        'name_activity': $('#name_activity').val(),
                        'ticket': $('#isTicket').val(),
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
                            message: 'Berhasil membuat event',
                            color: 'green'
                        })
                        // $('#uploadPoster').show();
                    },
                    error: function(res) {
                        iziToast.show({
                            title: "Error",
                            position: 'topLeft',
                            message: "Tolong isi semua field",
                            color: 'red'
                        })
                    }
                });
            });
        });

        function adjust(element) {
            element.style.height = "1px";
            element.style.height = (25 + element.scrollHeight) + "px";
        }
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
