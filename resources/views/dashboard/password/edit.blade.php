@extends('dashboard.layouts.main')
@section('container')


        {{-- Pesan Success --}}
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mt-4 col-lg-12 justify-content-center" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    {{-- End Pesan Success --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ganti Password</h1>
    </div> 
    <form action="/dashboard/password/update" method="post">
        @csrf
        @method('put')
            <div class="mb-3">
              <label for="current_password" class="form-label">Password Lama</label>
              <input type="password" class="form-control @error('current_password')
                  is-invalid
              @enderror" id="current_password" name="current_password" required >
              @error('current_password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control @error('password')
                    is-invalid
                @enderror" id="password" name="password" required >
                @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation')
                    is-invalid
                @enderror" id="password_confirmation" name="password_confirmation" required >
                @error('password_confirmation')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
          <button type="submit" class="btn btn-success">Save</button>
   </form>
@endsection