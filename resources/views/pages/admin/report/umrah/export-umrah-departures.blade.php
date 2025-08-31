<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <title>Daftar Keberangkatan Umroh Tahun {{ $year }}</title>
        <style>
            body {
                font-family: sans-serif;
                font-size: 12px;
            }

            h2 {
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid #999;
                padding: 5px;
            }

            th {
                text-align: center;
                background-color: #f2f2f2;
            }

            td {
                text-align: left;
            }
        </style>
    </head>

    <body>
        <h2>Daftar Keberangkatan Umroh Tahun {{ $year }}</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Paket</th>
                    <th>Nomor Registrasi</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Tanggal Kepulangan</th>
                    <th>Lokasi Kumpul</th>
                    <th>Pemandu</th>
                    <th>Maskapai</th>
                    <th>No Penerbangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departures as $data)
                    @php
                        $trip = $data->tripDetail;
                        $dep = $trip?->departure_date
                            ? \Illuminate\Support\Carbon::parse($trip->departure_date)->format('d/m/Y H:i')
                            : '-';
                        $ret = $trip?->return_date
                            ? \Illuminate\Support\Carbon::parse($trip->return_date)->format('d/m/Y H:i')
                            : '-';
                    @endphp
                    <tr>
                        <td style="text-align:center">{{ $loop->iteration }}</td>
                        <td>{{ $data->user->full_name }}</td>
                        <td>{{ $data->user->profile->gender ?? '-' }}</td>
                        <td>{{ $data->user->profile->phone ?? '-' }}</td>
                        <td>{{ $data->package->name ?? '-' }}</td>
                        <td>{{ $data->registration_number ?? '-' }}</td>
                        <td>{{ $dep }}</td>
                        <td>{{ $ret }}</td>
                        <td>{{ $trip->gathering_location ?? '-' }}</td>
                        <td>{{ $trip->guide_name ?? '-' }}</td>
                        <td>{{ $trip->airline ?? '-' }}</td>
                        <td>{{ $trip->flight_number ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
