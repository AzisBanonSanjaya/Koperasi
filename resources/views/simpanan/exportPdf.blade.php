<!DOCTYPE html>
<html>
<head>
    <title>Daftar Simpanan</title>
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
    <h2>Daftar Simpanan</h2>
    <table class="table">
    <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Simpanan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tanggal Simpanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($simpanans as $index => $simpanan)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $simpanan->nama }}</td>
                        <td>{{ $simpanan->jenis_simpanan }}</td>
                        <td>{{ number_format($simpanan->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $simpanan->keterangan }}</td>
                        <td>{{ \Carbon\Carbon::parse($simpanan->tanggal_simpanan)->format('d M Y') }}</td>
                    </tr>
                    @endforeach
            </tbody>
    </table>
</body>
</html>
