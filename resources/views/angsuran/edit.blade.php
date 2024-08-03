@extends('layouts.main')

@section('title', 'Edit Angsuran')

@section('content')
    <div class="container mt-5">
    <div class="row">
            <div class="col-lg-12">
                <a href="{{route('angsuran.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Edit Angsuran</h3>
                <form action="{{ route('angsuran.update', $angsuran->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nik" class="form-label">Nik</label>
                        <select class="form-select {{$nik ? 'select-readonly' : ''}} " id="nik" name="nik" required >
                            <option value="" disabled selected>Select a Nik</option>
                            @foreach($karyawans as $karyawan)
                                @if(empty($nik))
                                <option value="{{ $karyawan->nik }}" {{$angsuran->nik == $karyawan->nik ? 'selected' : ''}} data-name="{{$karyawan->name}}" data-email="{{$karyawan->email}}">
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
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $angsuran->nama }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_angsuran">Jumlah angsuran</label>
                        <input type="text" class="form-control currency" id="jumlah_angsuran" name="jumlah_angsuran" value="{{number_format($angsuran->jumlah_angsuran)}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                        <input type="text" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="{{$angsuran->tanggal_jatuh_tempo}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bayar">Tanggal Bayar</label>
                        <input type="text" class="form-control" id="tanggal_bayar" name="tanggal_bayar" value="{{$angsuran->tanggal_bayar}}" required>
                    </div>
                    <div class="form-group">
                    <label for="metode_pembayaran">Metode Pembayaran</label>
                    <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                        <option value="" disabled selected>Select Metode Pembayaran</option>
                        <option value="cash" {{$angsuran->metode_pembayaran == 'cash' ? 'selected' : ''}}>Cash</option>
                        <option value="transfer" {{$angsuran->metode_pembayaran == 'transfer' ? 'selected' : ''}}>Transfer</option>
                    </select>
                    </div>
                    <div class="form-group my-2" id="buktiWrapper">
                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update angsuran</button>
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
            $("#metode_pembayaran").on("change", function(){
                let metode_pembayaran =  $(this).find(':selected').text();
                if(metode_pembayaran == 'Transfer'){
                    $("#buktiWrapper").removeClass('hidden');
                }else{
                    $("#buktiWrapper").addClass('hidden');
                }
            });
            $("#metode_pembayaran").trigger('change');
            $("#nik").trigger('change');
        });
    </script>
@endpush