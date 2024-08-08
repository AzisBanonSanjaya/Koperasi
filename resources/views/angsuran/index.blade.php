@extends('layouts.main')

@section('title', 'Angsuran')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            @if(auth()->user()->role == 'admin')
                <form action="{{ route('angsuran.index') }}" method="GET">
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
                            <a href="{{ route('angsuran.index') }}" class="btn btn-warning btn-sm">Reset</a>
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Filter</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <div class="row mb-3 mt-5">
        <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{ route('angsuran.create') }}" class="btn btn-primary btn-sm mx-2">Tambah Angsuran</a>
            <a href="{{ route('export.pdf.angsuran') }}" class="btn btn-info btn-sm mx-2">Export PDF Angsuran</a>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah Angsuran</th>
                    <th scope="col">Tanggal Jatuh Tempo</th>
                    <th scope="col">Tanggal Bayar</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($angsurans as $index => $angsuran)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $angsuran->nama }}</td>
                        <td>{{ "Rp. " . number_format($angsuran->jumlah_angsuran, 0, ',', '.') }}</td>
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
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <form action="{{ route('angsuran.destroy', $angsuran->id) }}" method="POST" class="d-inline">
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
