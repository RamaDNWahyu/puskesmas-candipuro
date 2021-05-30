<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Laporan Laporan Pelayanan Tanggal
        {{ \Carbon\Carbon::parse(request()->get('tanggal_awal'))->format('d F Y') }} -
        {{ \Carbon\Carbon::parse(request()->get('tanggal_akhir'))->format('d F Y') }}</title>

    <style>
        @page {
            margin: 10px;
        }

        @media print {
            @page {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            body {
                margin: 1.6cm;
            }
        }

        table.table-header {
            border: 0;
        }

        table.table-header th {
            border: 0;
        }

        table.table-header td {
            border: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        table th {
            border: 1px solid #000;
            padding: 3px;
            font-weight: bold;
        }

        table td {
            border: 1px solid #000;
            padding: 3px;
            vertical-align: top;
        }

        #logotable {
            border: 0 !important;
        }

        #logotable td {
            border: 0 !important;
        }

        #judul {
            font-size: 20px;
            font-weight: bold;
        }

        #tebal2 {
            font-weight: bold;
        }

        #tebal {
            border: 1px solid #000;
            padding: 3px;
            font-weight: normal;
            text-align: center;
        }

        #garis {
            width: 40%;
            border: 1px solid #000000;
        }

    </style>
    <style type="text/css">
        .under {
            text-decoration: underline;
            color: #000000;
        }

        .over {
            text-decoration: overline;
        }

        .line {
            text-decoration: line-through;
        }

        .blink {
            text-decoration: blink;
        }

        .all {
            text-decoration: underline overline line-through;
        }

        a {
            text-decoration: none;
        }

    </style>
</head>
@php
function bulan_indo($month_number)
{
    $month_number = str_replace('0', '', $month_number);
    $bulan = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    return $bulan[$month_number];
}
@endphp

<body onload="window.print()">

    <table class="table-header" width="100%" border="0">
        <tbody>
            <tr>
                <td width="10%" valign="middle" style="padding-top: 20px"></td>

                <th align="center" valign="middle">
                    <span align="center" style="text-transform: uppercase; font-size: 30px;"><strong> PUSKESMAS<br>
                            CANDIPURO
                            <br></strong></span>

                    <span align="center">Alamat : <span
                            style="font-size: 18px!important; font-weight: normal;">Candipuro, Kabupaten Lampung
                            Selatan, Lampung 35356</span>
                        </p>

                </th>

            </tr>
        </tbody>
    </table>
    <p style="text-align: center"><strong><u>Laporan Pelayanan Puskesmas Candipuro</u> </strong></p>
    <!-- tabel detail disposisi -->
    <h4>Periode Tahun {{ \Carbon\Carbon::parse(request()->get('tanggal_awal'))->format('d F Y') }} s.d.
        {{ \Carbon\Carbon::parse(request()->get('tanggal_akhir'))->format('d F Y') }} </h4>


    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>PBI</th>
                <th>Non PBI</th>
                <th>UMUM</th>
                <th>Rujukan PBI</th>
                <th>Rujukan Non PBI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table as $t)
                <tr class="even gradeA">
                    <td width="2%" style="text-align: center">{{ $loop->index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($t->tanggal_berobat)->format('d F Y') }}</td>
                    <td style="text-align: center">{{ $t->pbi_count }}</td>
                    <td style="text-align: center">{{ $t->non_pbi_count }}</td>
                    <td style="text-align: center">{{ $t->umum_count }}</td>
                    <td style="text-align: center">{{ $t->rujukan_count }}</td>
                    <td style="text-align: center">{{ $t->non_rujukan_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="position: relative; margin-top: 2%;height: 150px">

        <span style="position: absolute;left: 10.5%; top: 5">TTD</span><span
            style="position: absolute;left: 10%; bottom: 0">SP2TP</span><span
            style="position: absolute;right: 7.5%; top: 5">Candipuro, {{ now()->format('d F Y') }}</span><span
            style="position: absolute;right: 10.5%; top: 50%">TTD</span><span
            style="position: absolute;right: 8.5%; bottom: 0">Kepala Puskesmas</span>
    </div>
</body>

</html>
