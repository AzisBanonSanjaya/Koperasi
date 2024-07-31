@extends('layouts.main')

@section('title', 'Edit Departemen')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{route('departemen.index')}}" class="btn btn-primary float-end my-2">Kembali</a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Edit Departemen</h3>
                <form action="{{ route('departemen.update', $departemen->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$departemen->name }}"  required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update Departemen</button>
                </form>
            </div>
        </div>
    </div>
@endsection

