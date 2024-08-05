<!DOCTYPE html>
<html>
<head>
    <title>Daftar Karyawan</title>
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
    <h2>Daftar Karyawan</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Departemen</th>
                <th scope="col">Tanggal Bergabung</th>
                <th scope="col">Tanggal Expired</th>
                <th scope="col">Status Keanggotaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $index => $k)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $k->name }}</td>
                    <td>{{ $k->departemen?->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($k->tanggal_bergabung)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($k->expired)->format('d-m-Y') }}</td>
                    <td>{{ $k->status_keanggotaan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
