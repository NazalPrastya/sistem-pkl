@extends('dashboard.layouts.main')

@section('container')
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="mt-5">{{ $company->nama_perusahaan }}</h1>
                    
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item fs-5"> Direktur/CEO: {{ $company->nama_directur }}</li>
                            <li class="list-group-item fs-5"> Bidang   : {{ $company->bidang }}</li>
                            <li class="list-group-item fs-5"> Karyawan   : {{ $company->jumlah_karyawan }}</li>
                            <li class="list-group-item fs-5"> Alamat  : <p class="d-inline">{{ $company->alamat }}</p></li>
                          </ul> 
                          <div class="mt-4">
                            <a href="/dashboard/company" class="btn btn-success"><i data-feather="arrow-left-circle"></i> Kembali</a>
                            @if ((Auth::guard('admin')->user()))     
                          <a href="/dashboard/company/{{ $company->id }}/edit" class="btn btn-primary"><span data-feather="edit"></span></a>
                          <form action="/dashboard/company/{{ $company->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger " onclick="return confirm('Apakah kamu ingin menghapus siswa {{ $company->name }} ?')"><span data-feather="trash"></span></button>
                          </form>
                          @endif
                        </div>
                </div>
            </div>

@endsection