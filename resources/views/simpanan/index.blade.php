@extends('layouts.main')

@section('title', 'Data Simpanan')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            @if(auth()->user()->role == 'admin')
                <form action="{{ route('simpanan.index') }}" method="GET">
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
                            <a href="{{ route('simpanan.index') }}" class="btn btn-warning btn-sm">Reset</a>
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Filter</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <div class="row mb-3 mt-3">
        <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{ route('simpanan.create') }}" class="btn btn-primary btn-sm mx-2">Tambah Simpanan</a>
            <a href="{{ route('export.pdf.simpanan') }}" class="btn btn-info btn-sm mx-2">Export PDF Simpanan</a>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Simpanan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tanggal Simpanan</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($simpanans as $index => $simpanan)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $simpanan->nama }}</td>
                        <td>{{ $simpanan->jenis_simpanan }}</td>
                        <td>{{ "Rp. " . number_format($simpanan->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $simpanan->keterangan }}</td>
                        <td>{{ \Carbon\Carbon::parse($simpanan->tanggal_simpanan)->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <a href="{{ route('simpanan.edit', $simpanan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('simpanan.destroy', $simpanan->id) }}" method="POST" class="d-inline">
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
