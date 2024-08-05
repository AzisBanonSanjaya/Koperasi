<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tabungan</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Daftar Tabungan</h2>
    <table class="table">
    <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Jumlah Transaksi</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Saldo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabungans as $index => $tabungan)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $tabungan->nik }}</td>
                        <td>{{ $tabungan->nama }}</td>
                        <td>{{ $tabungan->jenis_transaksi }}</td>
                        <td>{{ number_format($tabungan->jumlah_transaksi) }}</td>
                        <td>{{ $tabungan->tanggal_transaksi }}</td>
                        <td>{{ number_format($tabungan->saldo) }}</td>
                        <td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</body>
</html>
