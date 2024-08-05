<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pinjaman</title>
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
    <h2>Daftar Pinjaman</h2>
    <table class="table">
    <thead>
                <tr>
                    <th scope="col">No</th> 
                    <th scope="col">Nik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah Pinjaman</th>
                    <th scope="col">Sisa Angsuran</th>
                    <th scope="col">Tanggal Pinjaman</th>
                    <th scope="col">Jangka Waktu</th>
                    <th scope="col">Bunga Persen</th>
                    <th scope="col">Total Bunga</th>
                    <th scope="col">Total Angsuran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjamans as $index => $pinjaman)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $pinjaman->nik }}</td>
                        <td>{{ $pinjaman->nama }}</td>
                        <td>{{ "Rp. ". number_format($pinjaman->jumlah_pinjaman) }}</td>
                        <td>{{ "Rp. ". number_format($pinjaman->sisa_angsuran) }}</td>
                        <td>{{ $pinjaman->tanggal_pinjam }}</td>
                        <td>{{ $pinjaman->jangka_waktu }}</td>
                        <td>{{ number_format($pinjaman->bunga_persen, 2) ." %" }}</td>
                        <td>{{ "Rp. ". number_format($pinjaman->total_bunga) }}</td>
                        <td>{{ "Rp. ". number_format($pinjaman->total_angsuran) }}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
</body>
</html>
