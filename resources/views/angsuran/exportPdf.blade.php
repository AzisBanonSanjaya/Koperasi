<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Angsuran</title>
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
    <h2>Daftar Angsuran</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah Angsuran</th>
                <th scope="col">Tanggal Jatuh Tempo</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Bukti Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($angsurans as $index => $angsuran)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $angsuran->nama }}</td>
                    <td>{{ number_format($angsuran->jumlah_angsuran, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($angsuran->tanggal_jatuh_tempo)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($angsuran->tanggal_bayar)->format('d M Y') }}</td>
                    <td>{{ $angsuran->metode_pembayaran }}</td>
                    <td>
                        @if($angsuran->bukti_pembayaran)
                            <a href="{{ asset('storage/' . $angsuran->bukti_pembayaran) }}" target="_blank" class="btn btn-info btn-sm">Lihat Bukti</a>
                        @else
                            <span class="text-muted">Tidak Ada</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
