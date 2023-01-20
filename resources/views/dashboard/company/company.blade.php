@extends('dashboard.layouts.main')

@section('container')


<div class="row justify-content-center py-5">
        {{-- Flash Message --}}
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4 col-md-9 justify-content-center" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    
        @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show mt-4 col-md-9 justify-content-center" role="alert">
          {{ session('delete') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    
        @include('sweetalert::alert')
    
        {{-- End Flash Message --}}
  <div class="col-lg-11">
    <h2 class="text-center">Daftar Siswa</h2>

    <div class="row">
      <div class="col">
        <table class="table table-striped mt-3">
          @if ((Auth::guard('admin')->user()))          
        <a href="/dashboard/company/create" class="btn btn-secondary">Tambah data<i data-feather="plus"></i></a>
          @endif  
        <thead style="background-color: #b4bace">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Perusahaan</th>
              <th scope="col">Bidang</th>
              <th scope="col" class="text-center">Alamat</th>
              <th scope="col-md-5">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($companies as $company)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $company->nama_perusahaan }}</td>
              <td>{{ $company->bidang}}</td>
              <td>{{ $company->alamat }}</td>
              <td>
                <a href="/dashboard/company/{{ $company->id }}" class="badge bg-primary mb-1"><i data-feather="eye"></i></a>
                @if ((Auth::guard('admin')->user()))          
                <a href="/dashboard/company/{{ $company->id }}/edit" class="badge bg-success"><span data-feather="edit"></span></a>
                <form action="/dashboard/company/{{ $company->id }}" method="post" class="">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger mt-1 border-0" onclick="return confirm('Apakah kamu ingin menghapus perusahaan {{ $company->nama_perusahaan }} ?')"><span data-feather="delete"></span></button>              
                </form>
                @endif
    
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>    
      </div>
    </div>
    
  </div>
</div>


@endsection