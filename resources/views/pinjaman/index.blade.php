@extends('layouts.main')

@section('title', 'Data Pinjaman')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            @if(auth()->user()->role == 'admin')
                <form action="{{ route('pinjaman.index') }}" method="GET">
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
                            <a href="{{ route('pinjaman.index') }}" class="btn btn-warning btn-sm">Reset</a>
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Filter</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <div class="row mb-3 mt-5">
        <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{ route('pinjaman.create') }}" class="btn btn-primary btn-sm mx-2">Tambah Pinjaman</a>
            <a href="{{ route('export.pdf.pinjaman', ['filter_user' => @$filterNik]) }}" class="btn btn-info btn-sm mx-2">Export PDF Pinjaman</a>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah Pinjaman</th>
                    <th scope="col">Sisa Angsuran</th>
                    <th scope="col">Tanggal Pinjaman</th>
                    <th scope="col">Jangka Waktu</th>
                    <th scope="col">Bunga Persen</th>
                    <th scope="col">Total Bunga</th>
                    <th scope="col">Total Angsuran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjamans as $index => $pinjaman)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $pinjaman->nik }}</td>
                        <td>{{ $pinjaman->nama }}</td>
                        <td>{{ "Rp. " . number_format($pinjaman->jumlah_pinjaman, 0, ',', '.') }}</td>
                        <td>{{ "Rp. " . number_format($pinjaman->sisa_angsuran, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y') }}</td>
                        <td>{{ $pinjaman->jangka_waktu }}</td>
                        <td>{{ number_format($pinjaman->bunga_persen, 2) . " %" }}</td>
                        <td>{{ "Rp. " . number_format($pinjaman->total_bunga, 0, ',', '.') }}</td>
                        <td>{{ "Rp. " . number_format($pinjaman->total_angsuran, 0, ',', '.') }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <a href="{{ route('pinjaman.edit', $pinjaman->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pinjaman.destroy', $pinjaman->id) }}" method="POST" class="d-inline">
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
