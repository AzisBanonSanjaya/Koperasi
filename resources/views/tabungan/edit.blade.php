@extends('layouts.main')

@section('title', 'Edit Pinjaman')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('tabungan.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Edit Tabungan</h3>
                <form action="{{ route('tabungan.update', $tabungan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="nik">Nik</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ auth()->user()->nik }}" readonly required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->name }}" readonly required>
                </div>
                    <div class="form-group">
                        <label for="jenis_transaksi">Jenis transaksi</label>
                        <input type="text" class="form-control" id="jenis_transaksi" name="jenis_transaksi" value="{{$tabungan->jenis_transaksi}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_transaksi">Jumlah Transaksi</label>
                        <input type="text" class="form-control" id="jumlah_transaksi" name="jumlah_transaksi" value="{{$tabungan->jumlah_transaksi}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{$tabungan->tanggal_transaksi}}" required>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo</label>
                        <input type="text" class="form-control" id="saldo" name="saldo" value="{{$tabungan->saldo}}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update tabungan</button>
                </form>
            </div>
        </div>
    </div>
@endsection