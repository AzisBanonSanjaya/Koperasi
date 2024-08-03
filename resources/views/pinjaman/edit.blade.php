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
                        <label for="nik" class="form-label">Nik</label>
                        <select class="form-select {{$nik ? 'select-readonly' : ''}} " id="nik" name="nik" required >
                            <option value="" disabled selected>Select a Nik</option>
                            @foreach($karyawans as $karyawan)
                                @if(empty($nik))
                                <option value="{{ $karyawan->nik }}" {{$pinjaman->nik == $karyawan->nik ? 'selected' : ''}} data-name="{{$karyawan->name}}" data-email="{{$karyawan->email}}">
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
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pinjaman->nama }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                        <input type="text" class="form-control currency" id="jumlah_pinjaman" name="jumlah_pinjaman" value="{{number_format($pinjaman->jumlah_pinjaman)}}" required>
                    </div>
                   
                    <div class="form-group my-2">
                        <label for="jangka_waktu">Jangka Waktu</label>
                        <select class="form-select" id="jangka_waktu" name="jangka_waktu" required>
                            <option value="" disabled selected>Select</option>
                            <option value="bulan" {{ $jangka_waktu[1] == 'bulan' ? 'selected' : '' }}>Bulan</option>
                            <option value="tahun" {{ $jangka_waktu[1] == 'tahun' ? 'selected' : '' }}>Tahun</option>
                        </select>
                    </div>
                    <div class="form-group my-2" id="estimasiWrapper" style="display: none;">
                        <label for="estimasi" id="label-estimasi"></label>
                        <input type="text" class="form-control" id="estimasi" name="estimasi" value="{{ $jangka_waktu[0] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bunga_persen">Bunga Persen</label>
                        <input type="text" class="form-control" id="bunga_persen" name="bunga_persen" value="{{number_format($pinjaman->bunga_persen, 2)}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjaman</label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{$pinjaman->tanggal_pinjam}}" required>
                    </div>
                    <div class="form-group">
                        <label for="total_bunga">Total Bunga</label>
                        <input type="text" class="form-control" id="total_bunga" name="total_bunga" value="{{number_format($pinjaman->total_bunga)}}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="total_angsuran">Total Angsuran</label>
                        <input type="text" class="form-control" id="total_angsuran" name="total_angsuran" value="{{number_format($pinjaman->total_angsuran)}}" readonly required>
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
                calculateTotal();
            });

            function calculateTotal() {
                let jumlah_pinjaman = parseFloat($("#jumlah_pinjaman").val().split(',').join('')) || 0;
                let bunga_persen = parseFloat($("#bunga_persen").val()) || 0;
                let estimasi = parseFloat($("#estimasi").val()) || 0;
                let jangka_waktu = $("#jangka_waktu").find(':selected').val();

                let total_bunga = (jumlah_pinjaman * (bunga_persen / 100)) * estimasi;
                $("#total_bunga").val(parseFloat(total_bunga.toFixed(2), 10).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                let total_angsuran = 0;
                if (jangka_waktu === 'bulan') {
                    total_angsuran = (jumlah_pinjaman + total_bunga) / (estimasi);
                } else if (jangka_waktu === 'tahun') {
                    total_angsuran = (jumlah_pinjaman + total_bunga) / (estimasi * 12);
                }

                $("#total_angsuran").val(parseFloat(total_angsuran.toFixed(2), 10).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }

            
            $("#nik").on("change", function(){
                let nik = $(this).val();
                let name = $(this).find(':selected').attr('data-name');
                $("#nama").val(name);
            });
            $("#nik").trigger('change');
            $("#jangka_waktu").trigger('change');
        });
    </script>
@endpush
