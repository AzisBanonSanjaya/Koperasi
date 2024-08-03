@extends('layouts.main')

@section('title', 'Edit Simpanan')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('simpanan.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Edit Simpanan</h3>
                <form action="{{ route('simpanan.update', $simpanan->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="nik">Nik</label>
                    <select class="form-select {{$nik ? 'select-readonly' : ''}} " id="nik" name="nik" required >
                        <option value="" disabled selected>Select a Nik</option>
                        @foreach($karyawans as $karyawan)
                            @if(empty($nik))
                            <option value="{{ $karyawan->nik }}" {{$simpanan->nik == $karyawan->nik ? 'selected' : ''}} data-name="{{$karyawan->name}}" data-email="{{$karyawan->email}}">
                                {{ $karyawan->nik }}
                            </option>
                            @else
                            <option value="{{ $karyawan->nik }}" {{$nik == $karyawan->nik ? 'selected' : ''}} data-name="{{$karyawan->name}}" data-email="{{$karyawan->email}}">
                                {{ $karyawan->nik }}
                            </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $simpanan->nama }}" readonly required>
                </div>
                    <div class="form-group">
                        <label for="jenis_simpanan">Jumlah simpanan</label>
                        <input type="text" class="form-control" id="jenis_simpanan" name="jenis_simpanan" value="{{$simpanan->jenis_simpanan}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Total Bunga</label>
                        <input type="text" class="form-control currency" id="jumlah" name="jumlah" value="{{ number_format($simpanan->jumlah)}}" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$simpanan->keterangan}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_simpanan">Tanggal Simpanan</label>
                        <input type="date" class="form-control" id="tanggal_simpanan" name="tanggal_simpanan" value="{{$simpanan->tanggal_simpanan}}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update simpanan</button>
                </form>
            </div>
        </div>
    </div>
@endsection