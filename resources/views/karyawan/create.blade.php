@extends('layouts.main')

@section('title', 'Create Karyawan')

@section('content')
    <div class="container h-100 mt-5">
      <div class="row">
            <div class="col-lg-12">
                <a href="{{route('karyawan.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
      <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
          <h3>Add a Karyawan</h3>
          <form action="{{ route('karyawan.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="nik">Nik</label>
              <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="departemen">Departemen</label>
              <select class="form-select" id="departemen" name="departemen" required>
                  <option value="" disabled selected>Select a departemen</option>
                  <option value="gudang">Gudang</option>
                  <option value="maintenance">Maintenance</option>
                  <option value="edp">Edp</option>
              </select>
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <select class="form-select" id="jabatan" name="jabatan" required>
                  <option value="" disabled selected>Select a jabatan</option>
                  <option value="manager">Manager</option>
                  <option value="admin">Admin</option>
                  <option value="anggota">Anggota</option>
              </select>
            <div class="form-group">
              <label for="tanggal_bergabung">Tanggal_Bergabung</label>
              <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
              <label for="no_telepon">No_Telepon</label>
              <input type="number" class="form-control" id="no_telepon" name="no_telepon" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
            </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Create Karyawan</button>
          </form>
        </div>
      </div>
    </div>
@endsection