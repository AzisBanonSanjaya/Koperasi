@extends('layouts.main')

@section('title', 'Data Pinjaman')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('pinjaman.create')}}" class="btn btn-primary float-end my-2">Tambah Pinjam</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th> 
                    <th scope="col">Nik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jumlah Pinjaman</th>
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
                        <td>{{ "Rp. ". number_format($pinjaman->jumlah_pinjaman) }}</td>
                        <td>{{ $pinjaman->tanggal_pinjam }}</td>
                        <td>{{ $pinjaman->jangka_waktu }}</td>
                        <td>{{ number_format($pinjaman->bunga_persen, 2) ." %" }}</td>
                        <td>{{ "Rp. ". number_format($pinjaman->total_bunga) }}</td>
                        <td>{{ "Rp. ". number_format($pinjaman->total_angsuran) }}</td>
                        <td>
                            <a href="{{ route('pinjaman.edit', $pinjaman->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('pinjaman.destroy', $pinjaman->id) }}" method="POST" class="d-inline">
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
   

