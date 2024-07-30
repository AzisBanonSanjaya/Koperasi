@extends('layouts.main')

@section('title', 'Data Pinjaman')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('pinjaman.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add Pinjaman</h3>
                <form action="{{ route('pinjaman.store') }}" method="post">
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
                        <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                        <input type="text" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="bunga_persen">Bunga Persen</label>
                        <input type="text" class="form-control" id="bunga_persen" name="bunga_persen" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="jangka_waktu">Jangka Waktu</label>
                        <select class="form-select" id="jangka_waktu" name="jangka_waktu" required>
                            <option value="" disabled selected>Select</option>
                            <option value="bulan">Bulan</option>
                            <option value="tahun">Tahun</option>
                        </select>
                    </div>
                    <div class="form-group hidden my-2" id="estimasiWrapper">
                        <label for="estimasi" id="label-estimasi"></label>
                        <input type="text" class="form-control" id="estimasi" name="estimasi" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="total_bunga">Total Bunga</label>
                        <input type="text" class="form-control" id="total_bunga" name="total_bunga" readonly required>
                    </div>
                    
                    <div class="form-group my-2">
                        <label for="tanggal_pinjam">Tanggal Pinjaman</label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                    </div>
                    <div class="form-group my-2">
                        <label for="total_angsuran">Total Angsuran</label>
                        <input type="text" class="form-control" id="total_angsuran" name="total_angsuran" required>
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
            $("#jangka_waktu").on("change", function(){
                let jangka =  $(this).find(':selected').text();
                if(jangka == 'Tahun'){
                    $("#estimasiWrapper").removeClass('hidden');
                    $("#label-estimasi").text('Berapa Tahun');
                }else if(jangka == 'Bulan'){
                    $("#estimasiWrapper").removeClass('hidden');
                    $("#label-estimasi").text('Berapa Bulan');
                }else{
                    $("#estimasiWrapper").addClass('hidden');
                    $("#label-estimasi").text('');
                }
            });

            $("#jumlah_pinjaman, #bunga_persen, #estimasi").on('change', function(){
                let jumlah_pinjaman = $("#jumlah_pinjaman").val();
                let bunga_persen = $("#bunga_persen").val();
                let estimasi = $("#estimasi").val();
                
                if(jumlah_pinjaman != '' && bunga_persen != '' && estimasi != ''){
                    let bunga = (parseInt(jumlah_pinjaman) * parseFloat(bunga_persen)) * parseInt(estimasi);
                    $("#total_bunga").val(bunga);
                }
            });
        });
    </script>
@endpush