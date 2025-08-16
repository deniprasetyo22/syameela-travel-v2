<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>{{ $data['title'] }}</title>
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

            #hotel,
            #equipment {
                vertical-align: middle;
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
        <h2>
            Detail Keberangkatan {{ $data['trip']->registration->registration_number ?? '-' }}
        </h2>

        {{-- Informasi Pribadi --}}
        <div class="section">
            <div class="section-title">Informasi Pribadi</div>
            <table>
                <tr>
                    <td class="label">Nama Lengkap</td>
                    <td>{{ $data['trip']->registration->user->full_name ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Username</td>
                    <td>{{ $data['trip']->registration->user->username ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td>{{ $data['trip']->registration->user->email ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">NIK</td>
                    <td>{{ $data['trip']->registration->user->profile->national_id ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">No KK</td>
                    <td>{{ $data['trip']->registration->user->profile->family_card_number ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Jenis Kelamin</td>
                    <td>{{ $data['trip']->registration->user->profile->gender ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Telepon</td>
                    <td>{{ $data['trip']->registration->user->profile->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td>{{ $data['trip']->registration->user->profile->address ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Paket</td>
                    <td>{{ $data['trip']->registration->package->name ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Nomor Registrasi</td>
                    <td>{{ $data['trip']->registration->registration_number ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Skema Pembayaran</td>
                    <td>
                        @switch($data['trip']->registration->payment_scheme)
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
                        @switch($data['trip']->registration->status)
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
                <tr>
                    <td class="label">Tanggal Keberangkatan</td>
                    <td>
                        {{ \Carbon\Carbon::parse($data['trip']->departure_date)->translatedFormat('j F Y, H:i') ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <td class="label">Tanggal Kepulangan</td>
                    <td>
                        {{ \Carbon\Carbon::parse($data['trip']->return_date)->translatedFormat('j F Y, H:i') ?? '-' }}
                    </td>
                </tr>
                <tr>
                    <td class="label">Nama Pemandu</td>
                    <td>{{ $data['trip']->guide_name ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Titik Kumpul</td>
                    <td>{{ $data['trip']->gathering_location ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Maskapai</td>
                    <td>{{ $data['trip']->airline ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Nomor Penerbangan</td>
                    <td>{{ $data['trip']->flight_number ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label" id="hotel">Informasi Hotel</td>
                    <td>
                        {!! $data['trip']->hotel_info ?? '-' !!}
                    </td>
                </tr>
                <tr>
                    <td class="label" id="equipment">Informasi Perlengkapan</td>
                    <td>
                        {!! $data['trip']->equipment_info ?? '-' !!}
                    </td>
                </tr>
            </table>
        </div>

        {{-- Bukti Pembayaran --}}
        <div class="section">
            <div class="section-title">Bukti Pembayaran</div>
            <table>
                @foreach ($data['trip']->registration->payments ?? [] as $payment)
                    @if ($payment->payment_proof)
                        <tr>
                            <td class="label" colspan="2">
                                Pembayaran ke-{{ $loop->iteration }}
                                <br>
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
