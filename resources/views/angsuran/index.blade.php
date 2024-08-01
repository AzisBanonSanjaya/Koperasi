@extends('layouts.main')

@section('title', 'Angsuran')

@section('content')
  <div class="container mt-5">
      <div class="row">
          <div class="col-lg-12">
              <a href="{{route('angsuran.create')}}" class="btn btn-primary float-end my-2">Tambah Angsuran</a>
          </div>
      </div>
      <table id="angsuranTable" class="table">
          <thead>
              <tr>
                  <th scope="col">No</th> 
                  <th scope="col">Nama</th>  
                  <th scope="col">Jumlah angsuran</th>
                  <th scope="col">Tanggal Jatuh tempo</th>
                  <th scope="col">Tanggal Bayar</th>
                  <th scope="col">Metode Pembayaran</th>
                  <th scope="col">Actions</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($angsurans as $index => $angsuran)
                  <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td>{{ $angsuran->nama }}</td>
                      <td>{{ $angsuran->jumlah_angsuran }}</td>
                      <td>{{ $angsuran->tanggal_jatuh_tempo }}</td>
                      <td>{{ $angsuran->tanggal_bayar}}</td>
                      <td>{{ $angsuran->metode_pembayaran }}</td>
                      <td>
                          <a href="{{ route('angsuran.edit', $angsuran->id) }}" class="btn btn-sm btn-warning">Edit</a>
                          <form action="{{ route('angsuran.destroy', $angsuran->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#angsuranTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
    @endpush