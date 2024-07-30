@extends('layouts.main')

@section('title', 'Edit Pinjaman')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('pinjaman.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Edit Pinjaman</h3>
                <form action="{{ route('pinjaman.update', $pinjaman->id) }}" method="post">
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
                        <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                        <input type="text" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman" value="{{$pinjaman->jumlah_pinjaman}}" required>
                    </div>
                    <div class="form-group">
                        <label for="total_bunga">Total Bunga</label>
                        <input type="text" class="form-control" id="total_bunga" name="total_bunga" value="{{$pinjaman->total_bunga}}" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="jangka_waktu">Jangka Waktu</label>
                        <select class="form-select" id="jangka_waktu" name="jangka_waktu" required>
                            <option value="" disabled selected>Select</option>
                            <option value="bulan" {{ $pinjaman->jangka_waktu == 'bulan' ? 'selected' : '' }}>Bulan</option>
                            <option value="tahun" {{ $pinjaman->jangka_waktu == 'tahun' ? 'selected' : '' }}>Tahun</option>
                        </select>
                    </div>
                    <div class="form-group my-2" id="estimasiWrapper" style="display: none;">
                        <label for="estimasi" id="label-estimasi"></label>
                        <input type="text" class="form-control" id="estimasi" name="estimasi" value="{{ $pinjaman->estimasi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bunga_persen">Bunga Persen</label>
                        <input type="text" class="form-control" id="bunga_persen" name="bunga_persen" value="{{$pinjaman->bunga_persen}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjaman</label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{$pinjaman->tanggal_pinjam}}" required>
                    </div>
                    <div class="form-group">
                        <label for="total_angsuran">Total Angsuran</label>
                        <input type="text" class="form-control" id="total_angsuran" name="total_angsuran" value="{{$pinjaman->total_angsuran}}" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Pinjaman</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            function toggleEstimasiWrapper() {
                let jangka = $("#jangka_waktu").find(':selected').text();
                if (jangka === 'Tahun') {
                    $("#estimasiWrapper").show();
                    $("#label-estimasi").text('Berapa Tahun');
                } else if (jangka === 'Bulan') {
                    $("#estimasiWrapper").show();
                    $("#label-estimasi").text('Berapa Bulan');
                } else {
                    $("#estimasiWrapper").hide();
                    $("#label-estimasi").text('');
                }
            }

            toggleEstimasiWrapper();

            $("#jangka_waktu").on("change", function(){
                toggleEstimasiWrapper();
            });

            $("#jumlah_pinjaman, #bunga_persen, #estimasi").on('input', function(){
                let jumlah_pinjaman = parseFloat($("#jumlah_pinjaman").val());
                let bunga_persen = parseFloat($("#bunga_persen").val());
                let estimasi = parseInt($("#estimasi").val());

                if (!isNaN(jumlah_pinjaman) && !isNaN(bunga_persen) && !isNaN(estimasi)) {
                    let bunga = (jumlah_pinjaman * (bunga_persen / 100)) * estimasi;
                    $("#total_bunga").val(bunga);
                }
            });
        });
    </script>
@endpush
