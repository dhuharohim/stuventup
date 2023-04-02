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
    @php
        if ($event->ticket == 'yes') {
            $priceTicket = $event->price_ticket;
            $totalIncomeMhs = $priceTicket * sizeof($totalRegisMhs);
        
            $totalIncomeUmum = $priceTicket * sizeof($totalRegisUmum);
        }
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (!empty($registMhs))
            <div class="card">
                <div class="card-header" style="display: flex;
                justify-content: space-between;">
                    <h4>Data Registrasi Mahasiswa</h4>
                    <button id="btn-pdf-mhs" class="btn btn-warning">Download PDF</button>
                </div>
                @if ($event->ticket == 'yes')
                    <div class="d-flex">
                        <p style="padding: 0rem 2rem;">Total pendapatan registrasi mahasiswa: </p>
                        <strong>Rp. {{ $totalIncomeMhs }}</strong>
                    </div>
                @endif
                <div id="table-mahasiswa" class="table-responsive text-nowrap" style="line-height: 3rem">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Program Studi</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th style="text-align: center;">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registMhs as $reg)
                                <tr>
                                    <td>{{ $reg->profileMahasiswa->first_name }} {{ $reg->profileMahasiswa->last_name }}
                                    </td>
                                    <td>{{ $reg->profileMahasiswa->study_program }} </td>
                                    <td>{{ $reg->profileMahasiswa->email }}</td>
                                    <td>{{ $reg->profileMahasiswa->handphone }}</td>
                                    <td align="center">
                                        <span style="text-transform: capitalize;"
                                            class="badge 
                                        @if ($reg->status_regist == 'telah daftar') bg-label-warning me-1
                                        @elseif($reg->status_regist == 'terkonfirmasi')
                                        bg-label-success me-1 @endif">
                                            {{ $reg->status_regist }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-icon rounded-pill dropdown-toggle hide-arrow"
                                            data-toggle="dropdown" id="dropdownMenu" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class='bx bx-dots-vertical-rounded'></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end px-4" aria-labelledby="dropdownMenu">
                                                @if ($event->ticket == 'yes' && $reg->status_regist == 'telah daftar')
                                                <li>
                                                    <a onclick="getData({{ $reg->profileMahasiswa->id }})"
                                                        id="confirm-payment" class="showEventDrawer"
                                                        style="cursor: pointer; color: green">Konfirmasi
                                                        pembayaran</a>
                                                </li>
                                                @endif
                                                <li>
                                                    
                                                </li>
                                            </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding: 0.5rem 1rem;">
                        {{ $registMhs->links() }}
                    </div>
                </div>
            </div>
        @endif
        @if (sizeof($registUmum) != 0)
            <div class="card" style="margin-top: 2rem;">
                <div class="card-header" style="display: flex;
                justify-content: space-between;">
                    <h4>Data Registrasi Masyarakat Umum</h4>
                    <button id="btn-pdf-umum" class="btn btn-warning">Download PDF</button>
                </div>
                @if ($event->ticket == 'yes')
                    <div class="d-flex">
                        <p style="padding: 0rem 2rem;">Total pendapatan registrasi Masyarakat Umum: </p>
                        <strong>Rp. {{ $totalIncomeUmum }}</strong>
                    </div>
                @endif
                <div id="table-umum" class="table-responsive text-nowrap" style="line-height: 3rem">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th style="text-align: center;">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registUmum as $regUmum)
                                <tr>
                                    <td>{{ $regUmum->profileGeneral->first_name }}
                                        {{ $regUmum->profileGeneral->last_name }}
                                    </td>
                                    <td>{{ $regUmum->profileGeneral->email }}</td>
                                    <td>{{ $regUmum->profileGeneral->handphone }}</td>
                                    <td align="center">
                                        <span style="text-transform: capitalize;"
                                            class="badge 
                                        @if ($regUmum->status_regist == 'telah daftar') bg-label-warning me-1
                                        @elseif($regUmum->status_regist == 'terkonfirmasi')
                                        bg-label-success me-1 @endif">
                                            {{ $regUmum->status_regist }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-icon rounded-pill dropdown-toggle hide-arrow"
                                            data-toggle="dropdown" id="dropdownMenuUmum" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class='bx bx-dots-vertical-rounded'></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end px-4" aria-labelledby="dropdownMenuUmum">
                                            <li>
                                                <a onclick="getDataUmum({{ $regUmum->profileGeneral->id }})"
                                                    id="confirm-payment" class="showEventDrawer"
                                                    style="cursor: pointer; color: green">Konfirmasi
                                                    pembayaran</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding: 0.5rem 1rem;">
                        {{ $registUmum->links() }}
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection

@section('custom_js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
    </script>
    <script>
        $("body").on("click", "#btn-pdf-mhs", function() {
            html2canvas($('#table-mahasiswa')[0], {
                onrendered: function(canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("data-registrasi-mahasiswa.pdf");
                }
            });
        });
        $("body").on("click", "#btn-pdf-umum", function() {
            html2canvas($('#table-umum')[0], {
                onrendered: function(canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("data-registrasi-umum.pdf");
                }
            });
        });

        function getData(id) {
            $.ajax({
                url: '/konfirmasi-pembayaran',
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'type': 'paymentMhs'
                },
                success: function(res) {
                    iziToast.show({
                            title: "Sukses",
                            position: 'topCenter',
                            color: 'green',
                            message: 'Berhasil konfirmasi pembayaran acara'
                        }),
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                },
                error: function(res) {
                    iziToast.show({
                        title: "Error",
                        position: 'topCenter',
                        color: 'red',
                        message: "Gagal konfirmasi pembayaran acara"
                    })
                },
            });
        }

        function getDataUmum(id) {
            $.ajax({
                url: '/konfirmasi-pembayaran',
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id,
                    'type': 'paymentUmum'
                },
                success: function(res) {
                    iziToast.show({
                            title: "Sukses",
                            position: 'topCenter',
                            color: 'green',
                            message: 'Berhasil konfirmasi pembayaran acara'
                        }),
                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                },
                error: function(res) {
                    iziToast.show({
                        title: "Error",
                        position: 'topCenter',
                        color: 'red',
                        message: "Gagal konfirmasi pembayaran acara"
                    })
                },
            });
        }
    </script>
@endsection
