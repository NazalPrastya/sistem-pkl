@extends('dashboard.layouts.main')

@section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">  
  @if ((Auth::guard('admin')->user()))       
  <h2>Welcome Back Bang Admin {{ auth::guard('admin')->user()->nama_admin }} yang baik hati🤓</h2>
  @else
  <h1 class="h2">Welcome Back, {{ auth()->user()->name }} </h1>
  @endif
    </div>    

    <div class="container">
      <div class="row text-center mb-4">
        <div class="col">
          <h3>Jumlah Data</h3>
        </div>
      </div>
      <div class="row ">
        <div class="col-md-3 mb-4">
          <div class="card">
            <img src="img/user.png" class="card-img-top" alt="siswa" />
            <div class="card-body">
              <p class="card-text fs-3 text-center">Siswa</p>
              <p class="card-text text-center fs-4 rounded-circle text-white" style="background-color: #0f1425">{{ $user->count() }}</p>
               <p class="text-center"><a href="/dashboard/user" class="btn text-white" style="background-color: #1d050b"> <i data-feather="arrow-left-circle"></i> Detail</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="card">
            <img src="img/company.png" class="card-img-top" alt="project2" />
            <div class="card-body">
              <p class="card-text fs-3 text-center">Perusahaan</p>
              <p class="card-text text-center fs-4 rounded-circle text-white" style="background-color: #0f1425">{{ $company->count() }}</p>
              <p class="text-center"><a href="/dashboard/company" class="btn text-white" style="background-color: #1d050b"> <i data-feather="arrow-left-circle"></i> Detail</a></p>
            </div>


            

            
          </div>
        </div>
      </div>
    </div>

@endsection