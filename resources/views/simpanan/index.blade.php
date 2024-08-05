@extends('layouts.main')

@section('title', 'Data Simpanan')

@section('content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="{{ route('simpanan.create') }}" class="btn btn-primary float-end">Tambah Simpanan</a>
            <a href="{{ route('export.pdf.simpanan') }}" class="btn btn-info float-end my-2 mx-2">Export PDF Simpanan</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
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
                        <td>{{ number_format($simpanan->jumlah, 0, ',', '.') }}</td>
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
