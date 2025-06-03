<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Diagnosis Pasien</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            margin: 40px;
            color: #000;
        }

        .container {
            width: 80%;
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
            text-align: center;
            margin-bottom: 20px;
        }

        .info-table {
            margin-top: 30px;
            width: 100%;
        }

        .info-table td {
            padding: 8px 5px;
            font-size: 0.95rem;
        }

        .info-table td:first-child {
            width: 180px;
            font-weight: bold;
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

        <h5 class="text-center"><u>Laporan Hasil Diagnosis Pasien</u></h5>

        <table class="info-table">
            <tr>
                <td>Nama Pasien</td>
                <td>: {{ $diagnosis->nama }}</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>: {{ $diagnosis->umur }} tahun</td>
            </tr>
            <tr>
                <td>Tanggal Diagnosis</td>
                <td>: {{ $diagnosis->created_at->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td>Diagnosis Penyakit</td>
                <td>: <strong>{{ $diagnosis->penyakit->nama }}</strong></td>
            </tr>
            <tr>
                <td>Deskripsi Penyakit</td>
                <td>: {{ $diagnosis->penyakit->deskripsi }}</td>
            </tr>
            <tr>
                <td>Nilai Keyakinan (Belief)</td>
                <td>: {{ number_format($diagnosis->belief, 2) }}</td>
            </tr>
        </table>

        <div class="footer">
            Kolaka, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </div>
    </div>
</body>

</html>
