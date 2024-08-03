@extends('layouts.main')

@section('title', 'Detail Karyawan')

@section('content')
    <div class="container mt-5">
    <div class="row">
            <div class="col-lg-12">
                <a href="{{route('karyawan.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nik</th>`
                    <th scope="col">Name</th>
                    <th scope="col">Departemen</th>
                    <th scope="col">Tanggal Bergabung</th>
                    <th scope="col">Tanggal Expired</th>
                    <th scope="col">Status Keanggotaan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $karyawan->nik }}</td>
                    <td>{{ $karyawan->name }}</td>
                    <td>{{ $karyawan->departemen->name ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($karyawan->tanggal_bergabung)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($karyawan->expired)->format('d-m-Y') }}</td>
                    <td>{{ $karyawan->status_keanggotaan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection