@extends('layouts.main')

@section('title', 'Karyawan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('karyawan.create')}}" class="btn btn-primary float-end my-2">Tambah Karyawan</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Departemen</th>
                    <th scope="col">Tanggal Bergabung</th>
                    <th scope="col">Tanggal Expired</th>
                    <th scope="col">Status Keanggotaan</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $index => $karyawan)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $karyawan->name }}</td>
                        <td>{{ $karyawan->departemen }}</td>
                        <td>{{ \Carbon\Carbon::parse($karyawan->tanggal_bergabung)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($karyawan->expired)->format('d-m-Y') }}</td>
                        <td>{{ $karyawan->status_keanggotaan }}</td>
                        <td>
                            <a href="{{ $karyawan->nik ? route('karyawan.show', $karyawan->nik) : '#' }}" class="btn btn-sm btn-info my-2">Detail</a>
                            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-inline">
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
