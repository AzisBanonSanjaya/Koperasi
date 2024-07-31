@extends('layouts.main')

@section('title', 'Create User')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('user.index') }}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add a User</h3>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nik" class="form-label">Nik</label>
                        <select class="form-select" id="nik" name="nik" required>
                            <option value="" disabled selected>Select a Nik</option>
                            @foreach($karyawans as $karyawan)
                                <option value="{{ $karyawan->nik }}" data-name="{{$karyawan->name}}" data-email="{{$karyawan->email}}">{{ $karyawan->nik }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="" disabled selected>Select a role</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create User</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#nik").on("change", function(){
                let nik = $(this).val();
                let name = $(this).find(':selected').attr('data-name');
                let email = $(this).find(':selected').attr('data-email');
                $("#name").val(name);
                $("#email").val(email);
            });
        });
    </script>
@endpush