@extends('layouts.main')

@section('title', 'Angsuran')

@section('content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{ route('angsuran.create') }}" class="btn btn-primary float-end">Tambah Angsuran</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
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
                    <td>
                        <a href="{{ route('angsuran.edit', $angsuran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('angsuran.destroy', $angsuran->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
