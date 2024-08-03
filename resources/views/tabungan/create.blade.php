@extends('layouts.main')

@section('title', 'Tambah Pinjaman')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('tabungan.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add a Tabungan</h3>
                <form action="{{ route('tabungan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nik" class="form-label">Nik</label>
                        <select class="form-select {{$nik ? 'select-readonly' : ''}} " id="nik" name="nik" required >
                            <option value="" disabled selected>Select a Nik</option>
                            @foreach($karyawans as $karyawan)
                                <option value="{{ $karyawan->nik }}" {{$nik == $karyawan->nik ? 'selected' : ''}} data-name="{{$karyawan->name}}" data-email="{{$karyawan->email}}">
                                    {{ $karyawan->nik }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->name }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_transaksi">Jenis Transaksi</label>
                        <input type="text" class="form-control" id="jenis_transaksi" name="jenis_transaksi" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_transaksi">Jumlah Transaksi</label>
                        <input type="text" class="form-control currency" id="jumlah_transaksi" name="jumlah_transaksi" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" required>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo</label>
                        <input type="text" class="form-control currency" id="saldo" name="saldo" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Tabungan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#nik").on("change", function(){
                let nik = $(this).val();
                let name = $(this).find(':selected').attr('data-name');
                $("#nama").val(name);
            });
            $("#nik").trigger('change');
        });
    </script>
@endpush
