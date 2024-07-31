@extends('layouts.main')

@section('title', 'Data Simpanan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('simpanan.create') }}" class="btn btn-primary float-end my-2">Tambah Simpanan</a>
            </div>
        </div>
        <table class="table">
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
                        <td>{{ $simpanan->jumlah }}</td>
                        <td>{{ $simpanan->keterangan }}</td>
                        <td>{{ $simpanan->tanggal_simpanan }}</td>
                        <td>
                            <a href="{{ route('simpanan.edit', $simpanan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('simpanan.destroy', $simpanan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
