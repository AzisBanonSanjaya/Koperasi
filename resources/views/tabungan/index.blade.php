@extends('layouts.main')

@section('title', 'Data Pinjaman')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('tabungan.create')}}" class="btn btn-primary float-end my-2">Tambah Tabungan</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
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
                        <td>{{ $tabungan->jenis_transaksi }}</td>
                        <td>{{ $tabungan->jumlah_transaksi }}</td>
                        <td>{{ $tabungan->tanggal_transaksi }}</td>
                        <td>{{ $tabungan->saldo }}</td>
                        <td>
                            <a href="{{ route('tabungan.edit', $tabungan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tabungan.destroy', $tabungan->id) }}" method="POST" class="d-inline">
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