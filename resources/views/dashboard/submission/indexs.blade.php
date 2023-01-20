@extends('dashboard.layouts.main')
@section('container')

    {{-- Pesan  --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show mt-4 col-md-9 position-absolute justify-content-center" role="alert">
      {{ session('delete') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- End Pesan --}}


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Pengajuan</h1>
    </div> 
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Pengajuan</th>
            <th scope="col">Judul</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($submissions as $submission)            
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $submission->nama }}</td>
            <td>{{ $submission->tgl_pengajuan }}</td>
            <td>{{ $submission->judul }}</td>
            <td><a href="/dashboard/show/{{ $submission->id }}" class="btn btn-primary">Lihat Detail</a></td>
          </tr>
          @endforeach

        </tbody>
      </table>
@endsection