@extends('layouts.main')

@section('title', 'Create Simpanan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('simpanan.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add a Simpanan</h3>
                <form action="{{ route('simpanan.store') }}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="nik">Nik</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ auth()->user()->nik }}" readonly required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->name }}" readonly required>
                </div>
                    <div class="form-group">
                        <label for="jenis_simpanan">Jenis Simpanan</label>
                        <input type="text" class="form-control" id="jenis_simpanan" name="jenis_simpanan" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_simpanan">Tanggal Simpanan</label>
                        <input type="date" class="form-control" id="tanggal_simpanan" name="tanggal_simpanan" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Simpanan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
