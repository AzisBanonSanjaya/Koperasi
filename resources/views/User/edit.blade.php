@extends('layouts.main')

@section('title', 'Edit User')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('user.index') }}" class="btn btn-primary float-end my-2">Kembali</a>
        </div>
    </div>
    <h1>Edit User</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nik" class="form-label">Nik</label>
            <select class="form-select" id="nik" name="nik" required>
                <option value="" disabled selected>Select a Nik</option>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->nik }}" {{ $karyawan->nik == $user->nik ? 'selected' : '' }}>
                        {{ $karyawan->nik }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="">
        </div>

        <div class="form-group mb-3">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" value="{{ old('role', $user->role) }}" required>
        </div>

        <button type="submit" class="btn btn-primary my-2">Update</button>
    </form>
</div>
@endsection
