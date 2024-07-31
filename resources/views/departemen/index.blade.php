@extends('layouts.main')

@section('title', 'Departemen')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('departemen.create') }}" class="btn btn-primary float-end my-2">Add Departemen</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h3>List Departemen</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departemens as $departemen)
                        <tr>
                            <td>{{ $departemen->id }}</td>
                            <td>{{ $departemen->name }}</td>
                            <td>
                                <a href="{{ route('departemen.edit', $departemen->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('departemen.destroy', $departemen->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection