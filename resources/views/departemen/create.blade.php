@extends('layouts.main')

@section('title', 'Departemen')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('departemen.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Add Departemen</h3>
                <form action="{{ route('departemen.store') }}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"  required>
                    <br>
                    <button type="submit" class="btn btn-primary">Create Departemen</button>
                </form>
            </div>
        </div>
    </div>
@endsection