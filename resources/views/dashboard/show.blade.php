@extends('dashboard.layouts.main')

@section('container')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="mt-5">Nama : {{ $user->name }}</h1>
                    
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item fs-5"> Jurusan : {{ $user->jurusan }}</li>
                            <li class="list-group-item fs-5"> Kelas   : {{ $user->kelas }}</li>
                            <li class="list-group-item fs-5"> Status   : {{ $user->status }}</li>
                            <li class="list-group-item fs-5"> Jenis Kelamin   : {{ $user->jenis_kelamin }}</li>
                            <li class="list-group-item fs-5">  NIS   : {{ $user->NIS }}</li>
                            <li class="list-group-item fs-5"> Agama   : {{ $user->agama }}</li>
                            <li class="list-group-item fs-5"><p> Alamat   : {{ $user->alamat }} </p></li>
                            <li class="list-group-item fs-5"> Whatsapp   : {{ $user->whatsapp }}</li>
                            <li class="list-group-item fs-5"> Email   : {{ $user->email }}</li>
                            <li class="list-group-item fs-5"> PKL Di Perusahaan   : @if ($user->company_id)
                              {{ $user->company->nama_perusahaan}}
                            @else
                                Belum ada
                            @endif </li>
                            
                          </ul> 
                          <div class="mt-2">
                            <a href="/dashboard/user" class="btn btn-success "><i data-feather="arrow-left-circle"></i> Kembali</a>
                            @if ((Auth::guard('admin')->user())) 
                            <a href="/dashboard/user/{{ $user->id }}/edit" class="btn btn-primary"><span data-feather="edit"></span></a>
                          <form action="/dashboard/user/{{ $user->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger " onclick="return confirm('Apakah kamu ingin menghapus siswa {{ $user->name }} ?')"><span data-feather="delete"></span></button>
                          </form>
                            @endif
                        </div>
                </div>
            </div>

@endsection