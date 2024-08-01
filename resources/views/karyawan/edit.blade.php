@extends('layouts.main')

@section('title', 'Edit Karyawan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('karyawan.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <h1>Edit Karyawan</h1>
        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nik">Nik</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $karyawan->nik }}" readonly required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $karyawan->name }}" readonly required>
            </div>
            <div class="form-group">
                <label for="no_telepon">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $karyawan->no_telepon }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $karyawan->email }}" required>
            </div>
            <div class="form-group">
              <label for="departemen">Departemen</label>
              <select class="form-select" id="departemen" name="departemen"  required readonly>
                  <option value="" disabled selected>Select a departemen</option>
                  @foreach($departemen as $d)
                      <option value="{{ $d->id }}" {{ $karyawan->d == $karyawan->user_d ? 'selected' : '' }}>
                      {{ $d->name }}
                      </option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <select class="form-select "name="jabatan" required readonly>
                  <option value="" disabled selected>Select a jabatan</option>
                  @foreach($jabatan as $j)
                        <option value="{{ $j->id }}" {{ $karyawan->j == $karyawan->user_j ? 'selected' : '' }}>
                            {{ $j->name }}
                        </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $karyawan->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" value="{{ $karyawan->tanggal_bergabung }}" required>
            </div>
            <button type="submit" class="btn btn-primary my-2">Update</button>
        </form>
    </div>
@endsection