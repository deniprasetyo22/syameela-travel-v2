<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Bukti Pembayaran Jamaah Haji</title>
        <style>
            body {
                font-family: sans-serif;
                font-size: 11px;
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid #000;
            }

            td.label {
                font-weight: bold;
                width: 150px;
                vertical-align: top;
                background-color: #f0f0f0;
            }

            td,
            th {
                padding: 8px;
                vertical-align: top;
            }

            .img-center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                max-height: 400px;
                max-width: 100%;
                border: 1px solid #999;
                margin-top: 5px;
            }

            .section {
                margin-bottom: 40px;
                page-break-inside: avoid;
            }

            .section-title {
                font-size: 13px;
                font-weight: bold;
                margin-bottom: 10px;
                border-bottom: 1px dashed #ccc;
                padding-bottom: 5px;
            }
        </style>
    </head>

    <body>
        <h2>Bukti Pembayaran Jamaah Haji</h2>

        <div class="section">
            <div class="section-title">Informasi Pribadi</div>
            <table>
                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td>{{ $jamaah->user->full_name ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Username</td>
                    <td>{{ $jamaah->user->username ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td>{{ $jamaah->user->email ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">NIK</td>
                    <td>{{ $jamaah->user->profile->national_id ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">No KK</td>
                    <td>{{ $jamaah->user->profile->family_card_number ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Jenis Kelamin</td>
                    <td>{{ $jamaah->user->profile->gender ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Telepon</td>
                    <td>{{ $jamaah->user->profile->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td>{{ $jamaah->user->profile->address ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Paket</td>
                    <td>{{ $jamaah->package->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Nomor Registrasi</td>
                    <td>{{ $jamaah->registration_number ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Skema Pembayaran</td>
                    <td>
                        @switch($jamaah->payment_scheme)
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
                </tr>
                <tr>
                    <td class="label">Status Pembayaran</td>
                    <td>
                        @switch($jamaah->status)
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
            </table>
        </div>

        <div class="section">
            <div class="section-title">Bukti Pembayaran</div>
            <table>

                @foreach ($jamaah->payments as $payment)
                    @if ($payment->payment_proof)
                        <tr>
                            <td class="label" colspan="2">
                                Pembayaran ke-{{ $loop->iteration }}
                                Total: {{ Number::currency($payment->amount, 'Rp ', 'id', 0) }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <img src="{{ public_path($payment->payment_proof) }}" alt="Bukti Pembayaran"
                                    class="img-center">
                            </td>
                        </tr>
                    @endif
                @endforeach

            </table>
        </div>
    </body>

</html>
