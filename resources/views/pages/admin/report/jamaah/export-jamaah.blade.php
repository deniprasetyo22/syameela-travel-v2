<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Daftar User</title>
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

            th {
                border: 1px solid #999;
                padding: 5px;
                text-align: center;
            }

            td {
                border: 1px solid #999;
                padding: 5px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <h2>Daftar Jamaah</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Paket</th>
                    <th>Nomor Registrasi</th>
                    <th>Skema Pembayaran</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jamaah as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->user->full_name }}</td>
                        <td>{{ $data->user->username }}</td>
                        <td>{{ $data->user->email }}</td>
                        <td>{{ $data->user->profile->gender ?? '-' }}</td>
                        <td>{{ $data->user->profile->phone ?? '-' }}</td>
                        <td>{{ $data->user->profile->address ?? '-' }}</td>
                        <td>{{ $data->package->name ?? '-' }}</td>
                        <td>{{ $data->registration_number ?? '-' }}</td>
                        <td>
                            @switch($data->payment_scheme)
                                @case('full_payment')
                                    Pembayaran Penuh
                                @break

                                @case('installment_3')
                                    Cicilan 3x
                                @break

                                @case('installment_6')
                                    Cicilan 6x
                                @break

                                @case('installment_9')
                                    Cicilan 9x
                                @break

                                @case('ccl')
                                    Tempo
                                @break

                                @default
                                    -
                            @endswitch
                        </td>
                        <td>
                            @switch($data->status)
                                @case('unpaid')
                                    Belum Dibayar
                                @break

                                @case('processing')
                                    Sedang Diproses
                                @break

                                @case('paid')
                                    Lunas
                                @break

                                @default
                                    -
                            @endswitch
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
