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
                        <label for="nik" class="form-label">Nik</label>
                        <select class="form-select {{$nik ? 'select-readonly' : ''}} " id="nik" name="nik" required >
                            <option value="" disabled selected>Select a Nik</option>
                            @foreach($karyawans as $karyawan)
                                @if(empty($nik))
                                <option value="{{ $karyawan->nik }}" {{$tabungan->nik == $karyawan->nik ? 'selected' : ''}} data-name="{{$karyawan->name}}" data-email="{{$karyawan->email}}">
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
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $tabungan->nama }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_transaksi">Jenis transaksi</label>
                        <input type="text" class="form-control" id="jenis_transaksi" name="jenis_transaksi" value="{{$tabungan->jenis_transaksi}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_transaksi">Jumlah Transaksi</label>
                        <input type="text" class="form-control currency" id="jumlah_transaksi" name="jumlah_transaksi" value="{{number_format($tabungan->jumlah_transaksi)}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{$tabungan->tanggal_transaksi}}" required>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo</label>
                        <input type="text" class="form-control currency" id="saldo" name="saldo" value="{{number_format($tabungan->saldo)}}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update tabungan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $("#nik").on("change", function() {
            let nik = $(this).val();
            let name = $(this).find(':selected').data('name');
            $("#nama").val(name);
        });
        $("#nik").trigger('change')
    });
</script>
@endpush