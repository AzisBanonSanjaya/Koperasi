@extends('layouts.main')

@section('title', 'Data Jabatan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('jabatan.create') }}" class="btn btn-primary float-end my-2">Tambah Jabatan</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jabatans as $index => $jabatan)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $jabatan->name }}</td>
                        <td>
                            <a href="{{ route('jabatan.edit', $jabatan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('jabatan.destroy', $jabatan->id) }}" method="POST" class="d-inline">
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
