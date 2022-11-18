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
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h4>Data Registrasi Kegiatan</h4>
            </div>
            <div class="table-responsive text-nowrap" style="line-height: 3rem">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                           
                        </tr>
                        <tr>
                            <td colspan="8" style="text-align: center">Tidak ada data.</td>
                        </tr>
                    </tbody>
                </table>
                <div style="padding: 0.5rem 1rem;">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

@endsection