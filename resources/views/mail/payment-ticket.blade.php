<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuvent UP - Ticket payment</title>
    <style type="text/css">
        body {
            margin: 0;
            background-color: #cccccc;
        }

        table {
            border-spacing: 0;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: white;
            padding-bottom: 60px;
        }

        .main {
            background-color: white;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: Verdana, Geneva, Tahoma, sans-serif color: black;
        }

        .info {
            background: #73c15e;
            text-indent: 1rem;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .info-detail {
            text-indent: 2rem;
            background: #73c15e52;
            font-size: 12px;


        }

        .desc-name {
            font-weight: bold;
        }
    </style>
</head>

<body>



    <!-- TOP BORDER -->
    <center class="wrapper">
        <table class="main" width="100%">
            <tr>
                <td height="20" style="background-color: #73c15e;"></td>
            </tr>
            <tr>
                <td align="center">
                    <img src="{{ asset('assets/img/stuventlogo.png') }}" alt=""
                        style="width: 20%; margin:1rem 0;">
                </td>
            </tr>
            <tr>
                <td height="1" style="background: #cccc;"></td>
            </tr>
            <tr>
                <td align="center">
                    @if (!empty($registMhs))
                        <p style="margin: 3rem 0; color:#73c15e; font-size:14px; font-weight:bold;">Halo
                            {{ $registMhs->profileMahasiswa->first_name }}, terima kasih telah
                            melakukan pembayaran!</p>
                    @endif
                    @if (!empty($registUmum))
                        <p style="margin-top: 3rem; color:#73c15e;">Halo {{ $registUmum->profileGeneral->first_name }},
                            Terima kasih telah melakukan pembayaran!</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <table class="info" width="100%">
                        <tr>
                            <td>
                                <p>Informasi pemesanan</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="info-detail" width="100%">
                        <tr>
                            <td>
                                <p class="desc-name" style="margin-top:1rem;">Nama pembeli: </p>
                            </td>
                            <td>
                                @if (!empty($registMhs))
                                    <p>{{ $registMhs->profileMahasiswa->first_name }}</p>
                                @endif
                                @if (!empty($registUmum))
                                    <p>{{ $registUmum->profileGeneral->first_name }}</p>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <p class="desc-name">Event:</p>
                            </td>
                            <td>
                                @if (!empty($registMhs))
                                    <p>{{ $registMhs->event->name_activity }}</p>
                                @endif
                                @if (!empty($registUmum))
                                    <p>{{ $registUmum->event->name_activity }}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="desc-name">Penyelenggara:</p>
                            </td>
                            <td>
                                @if (!empty($registMhs))
                                    <p>{{ $registMhs->event->profile->name_himpunan }}</p>
                                @endif
                                @if (!empty($registUmum))
                                    <p>{{ $registUmum->event->profile->name_himpunan }}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="desc-name">Jenis event:</p>
                            </td>
                            <td>
                                @if (!empty($registMhs))
                                    <p>{{ $registMhs->event->type_activity }}</p>
                                @endif
                                @if (!empty($registUmum))
                                    <p>{{ $registUmum->event->type_activity }}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="desc-name">Tempat pelaksanaan:</p>
                            </td>
                            <td>
                                @if (!empty($registMhs))
                                    <p>{{ $registMhs->event->place_activity }}</p>
                                @endif
                                @if (!empty($registUmum))
                                    <p>{{ $registUmum->event->place_activity }}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="desc-name">Waktu</p>
                            </td>
                            <td>
                                @if (!empty($registMhs))
                                    @if ($registMhs->event->time_end_activity == null)
                                        <p>{{ $registMhs->event->time_start_activity }} - Selesai</p>
                                    @else
                                        <p>{{ $registMhs->event->time_start_activity }} -
                                            {{ $registMhs->event->time_end_activity }} /p>
                                    @endif
                                @endif
                                @if (!empty($registUmum))
                                    @if ($registUmum->event->time_end_activity == null)
                                        <p>{{ $registUmum->event->time_start_activity }} - Selesai</p>
                                    @else
                                        <p>{{ $registUmum->event->time_start_activity }} -
                                            {{ $registUmum->event->time_end_activity }} </p>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="desc-name">Harga tiket:</td>
                            <td>
                                @if (!empty($registMhs))
                                    <p>{{ $registMhs->event->price_ticket }}</p>
                                @endif
                                @if (!empty($registUmum))
                                    <p>{{ $registUmum->event->price_ticket }}</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="desc-name">Pembayaran:</td>
                            <td>
                                <p>Transfer</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="desc-name">Tanggal pembayaran:</td>
                            <td>
                                @if (!empty($registMhs))
                                    <p>{{ $registMhs->updated_at }}</p>
                                @endif
                                @if (!empty($registUmum))
                                    <p>{{ $registUmum->updated_at }}</p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="center">
                    <p style="font-size: 14px; font-weight:bold; margin: 2rem 0;">Mohon tunjukkan bukti pembayaran ini
                        saat acara
                        berlangsung.</p>
                </td>
            </tr>
            <tr>
                <td height="1" style="background: #cccccc;"></td>
            </tr>
            <tr>
                <td align="center">
                    <p style="font-size:10px; margin:1rem 0; font-weight:bold; color:#73c15e;">© Copyrights Stuvent UP.
                        All right reserved.</p>
                </td>
            </tr>
            <tr>
                <td height="20" style="background-color: #73c15e;"></td>
            </tr>
        </table>
    </center>
</body>

</html>
