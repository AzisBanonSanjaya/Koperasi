@extends('layouts.main')

@section('title', 'Karyawan')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('karyawan.create') }}" class="btn btn-primary mx-2">Tambah Karyawan</a>
                <a href="{{ route('export.pdf.karyawan') }}" class="btn btn-info mx-2">Export PDF Karyawan</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="karyawanTable" class="table table-striped table-hover">
            <thead class="table-dark">
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
                @foreach ($karyawan as $index => $k)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $k->name }}</td>
                        <td>{{ $k->departemen?->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($k->tanggal_bergabung)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($k->expired)->format('d-m-Y') }}</td>
                        <td>{{ $k->status_keanggotaan }}</td>
                        <td>
                            <a href="{{ $k->nik ? route('karyawan.show', $k->nik) : '#' }}" class="btn btn-info btn-sm mx-1">Detail</a>
                            <!-- <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm mx-1">Edit</a> -->
                            <form action="{{ route('karyawan.destroy', $k->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#karyawanTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>
@endpush
