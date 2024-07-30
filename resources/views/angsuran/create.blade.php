@extends('layouts.main')

@section('title', 'Create Angsuran')

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('angsuran.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row  justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add a Angsuran</h3>
                <form action="{{ route('angsuran.store') }}" method="post">
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
                        <label for="jumlah_angsuran">Jumlah Angsuran</label>
                        <input type="text" class="form-control" id="jumlah_angsuran" name="jumlah_angsuran" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_jatuh_tempo">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bayar">Tanggal Bayar</label>
                        <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required>
                    </div>
                    <div class="form-group">
                    <label for="metode_pembayaran">Metode Pembayaran</label>
                    <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                        <option value="" disabled selected>Select Metode Pembayaran</option>
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
                    </select>
                    </div>
                    <div class="form-group my-2">
                        <label for="bukti_pembayaran">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Pinjaman</button>
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
        });
    </script>
@endpush