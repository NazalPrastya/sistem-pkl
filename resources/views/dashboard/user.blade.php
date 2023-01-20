@extends('dashboard.layouts.main')

@section('container') 

{{-- Flash Message --}}
@include('sweetalert::alert')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mt-4 col-md-9 position-absolute justify-content-center" role="alert">
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
{{-- End Flash Massage --}}

<div class="row justify-content-center py-5">
  <div class="col-lg-10">
    <h2 class="text-center">Daftar Siswa</h2>
    @if ((Auth::guard('admin')->user()))          
    <a href="/dashboard/user/create" class="btn btn-secondary mb-2">Tambah data<i data-feather="plus"></i></a>
    @endif
    <table class="table table table-striped">
      <thead style="background-color: #b4bace">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Kelas</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->kelas}}</td>
          <td>{{ $user->jurusan}}</td>
          <td>
            @if ($user->status == "Diterima")
               {{ $user->status }} <i data-feather="check" style="color: green" class="feather-16"></i>
            @else
            {{ $user->status }} <span data-feather="x" style="color: rgb(255, 8, 0); font-size:40px;"></span>
            @endif
            </td>
          <td>
            <a href="/dashboard/user/{{ $user->id }}" class="btn btn-primary"><i data-feather="eye"></i></a>
            @if ((Auth::guard('admin')->user()))          
            <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-success"><span data-feather="edit"></span></a>
            <form action="/dashboard/user/{{ $user->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="btn btn-danger " onclick="return confirm('Apakah kamu ingin menghapus siswa {{ $user->name }} ?')"><span data-feather="delete"></span></button>
            </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>    
  </div>
</div>


@endsection