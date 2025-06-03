<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Data Diagnosis Penyakit</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            color: #000;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 85%;
            margin: 0 auto;
        }

        .text-center {
            text-align: center;
        }

        h3, h5 {
            margin: 0;
        }

        hr {
            border: none;
            border-top: 2px solid #000;
            margin: 10px 0 20px;
        }

        address {
            font-size: 0.9rem;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
        }

        table thead {
            background-color: #f0f0f0;
        }

        table th,
        table td {
            border: 1px solid #333;
            padding: 8px 12px;
            font-size: 0.95rem;
            text-align: left;
        }

        table th {
            text-align: center;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 0.9rem;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <h3 class="text-center">RSUD SMS BERJAYA</h3>
        <address>
            Jl. Mekongga Indah, Jl. Poros Kolaka - Pomalaa, Tahoa, Kec. Latambaga,<br>
            Kabupaten Kolaka, Sulawesi Tenggara 93511
        </address>
        <hr>

        <h5 class="text-center"><u>Laporan Data Diagnosis Penyakit</u></h5>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Diagnosis Penyakit</th>
                    <th>Nilai Keyakinan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($log_diagnosis as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td class="text-center">{{ $item->umur }}</td>
                    <td>{{ $item->penyakit->nama }}</td>
                    <td>{{ $item->belief}}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            Kolaka, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>
    </div>
</body>

</html>
