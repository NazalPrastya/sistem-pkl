@extends('dashboard.layouts.main')
@section('container')
@include('sweetalert::alert')

    {{-- Pesan Success --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4 col-lg-12 justify-content-center" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- End Pesan Success --}}

    <h2 class="mt-4 ms-3">My Profile</h2>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Nama : {{ auth()->user()->name }}</li>
        <li class="list-group-item">Jurusan : {{ auth()->user()->jurusan }}</li>
        <li class="list-group-item">Kelas : {{ auth()->user()->kelas }}</li>
        <li class="list-group-item">Jenis Kelamin : {{ auth()->user()->jenis_kelamin }} </li>
        <li class="list-group-item">Nomor Induk Sekolah : {{ auth()->user()->NIS }}</li>
        <li class="list-group-item">Agama : {{ auth()->user()->agama }}</li>
        <li class="list-group-item">Alamat : {{ auth()->user()->alamat }}</li>
        <li class="list-group-item">Whatsapp : {{ auth()->user()->whatsapp }}</li>
        <li class="list-group-item">Email : {{ auth()->user()->email }}</li>
        <a href="/dashboard/profile/{{ auth()->user()->name }}/edit" class="ms-3 mt-3">Change Profile</a>

      </ul>

@endsection