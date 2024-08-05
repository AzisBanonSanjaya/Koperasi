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
              @error('nik')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nama">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
              @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="departemen">Departemen</label>
              <select class="form-select" id="departemen" name="departemen" required>
                  <option value="" disabled selected>Select a departemen</option>
                  @foreach($departemen as $d)
                      <option value="{{ $d->id }}" >{{ $d->name}}</option>
                  @endforeach
              </select>
              @error('departemen')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <select class="form-select" id="jabatan" name="jabatan" required>
                  <option value="" disabled selected>Select a jabatan</option>
                  @foreach($jabatan as $j)
                      <option value="{{ $j->id }}" >{{ $j->name}}</option>
                  @endforeach
              </select>
              @error('jabatan')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            <div class="form-group">
              <label for="tanggal_bergabung">Tanggal_Bergabung</label>
              <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" required>
              @error('tanggal_bergabung')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required>
              @error('alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_telepon">No_Telepon</label>
              <input type="number" class="form-control" id="no_telepon" name="no_telepon" required>
              @error('no_telepon')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" required>
              @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
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