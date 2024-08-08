@extends('layouts.main')

@section('title', 'Data Tabungan')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            @if(auth()->user()->role == 'admin')
                <form action="{{ route('tabungan.index') }}" method="GET">
                    <div class="card border-light shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Filter Data</h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="form-group">
                                <label for="filter_user" class="form-label">User</label>
                                <select name="filter_user" id="filter_user" class="form-select form-select-sm">
                                    <option value="">Pilih User</option>
                                    @foreach($karyawans as $karyawan)
                                        <option value="{{ $karyawan->nik }}" {{ @$filterNik == $karyawan->nik ? 'selected' : '' }}>
                                            {{ $karyawan->nik . ' - ' . $karyawan->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end p-2">
                            <a href="{{ route('tabungan.index') }}" class="btn btn-warning btn-sm">Reset</a>
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Filter</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <div class="row mb-3 mt-3">
        <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{ route('tabungan.create') }}" class="btn btn-primary btn-sm mx-2">Tambah Tabungan</a>
            <a href="{{ route('export.pdf.tabungan', ['filter_user' => @$filterNik]) }}" class="btn btn-info btn-sm mx-2">Export PDF Tabungan</a>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Jumlah Transaksi</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabungans as $index => $tabungan)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $tabungan->nik }}</td>
                        <td>{{ $tabungan->nama }}</td>
                        <td>{{ $tabungan->jenis_transaksi }}</td>
                        <td>{{ "Rp. " . number_format($tabungan->jumlah_transaksi, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($tabungan->tanggal_transaksi)->format('d M Y') }}</td>
                        <td>{{ "Rp. " . number_format($tabungan->saldo, 0, ',', '.') }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <a href="{{ route('tabungan.edit', $tabungan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tabungan.destroy', $tabungan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
