@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Pengajuan {{ $submission->nama }}</h1>
    </div> 

    <ul class="list-group list-group-flush">
        <li class="list-group-item fs-5"> Pengirim : {{ $submission->user->name }}</li>
        <li class="list-group-item fs-5">Nama :{{ $submission->nama }}</li>
        <li class="list-group-item fs-5" >Tanggal Pengajuan : {{ $submission->tgl_pengajuan }}</li>
        <li class="list-group-item fs-5">Judul : {{ $submission->judul }}</li>
        <li class="list-group-item fs-5">Pengajuan : <article>{!! $submission->pengajuan !!}</article></li>
    </ul>
    @if ((Auth::guard('user')->user())) 
      <a href="/dashboard/submission/{{ $submission->id }}/edit" class="btn btn-success ms-3">Edit</a>
    @endif
      <form action="/dashboard/submission/{{ $submission->id }}" method="post" class=" d-inline px-2">
        @csrf
        @method('delete')
       <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah kamu ingin mengahapus pengajuan?')">Delete</button>
    </form>
@endsection