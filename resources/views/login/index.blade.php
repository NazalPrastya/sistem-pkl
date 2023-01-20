@extends('layouts.main')

{{-- @section('container') --}}

{{-- Start Hero --}}
<section id="hero">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show container" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
          <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Sistem Informasi PKL SMKN 1 Ciomas</h1>
            <p class="col-lg-10 fs-4">Sistem ini dibuat oleh Nazal Gusti Prastya XI PPLG 2. 
                Dalam rangka mengikuti lomba 17 agustus yang diselenggarakan oleh kepala program Pengembangan Perangkat Lunak dan Game.</p>
          </div>

          <div class="col-md-8 mx-auto col-lg-5">     
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/">
                @csrf
                <h3 class="text-center mb-3">Sign In</h3>
              <div class="form-floating mb-3">
                <input type="email" id="email" class="form-control @error('email')
                    is-invalid
                @enderror" placeholder="name@example.com" name="email" required value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>  
                @enderror 

              </div>
              <div class="form-floating mb-3">
                <input type="password" id="password" class="form-control @error('password')
                    is-invalid
                @enderror"placeholder="Password" name="password" value="{{ old('password') }}">
                <label for="password">Password</label>

                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>  
                @enderror 
              </div>
              <div class="checkbox mb-3">
              </div>
              <button class="w-100 btn btn-lg btn-primary border-0" style="background-color: #1D050B" type="submit">Sign up</button>
              <hr class="my-4">
              <small class="text-muted d-block text-center">Lupa Kata sandi? Klik <a href="/register">Disini!</a></small>
            </form>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1D050B"
         fill-opacity="1" d="M0,64L48,90.7C96,117,192,171,288,176C384,181,480,139,576,117.3C672,96,
         768,96,864,117.3C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,
         320C1344,320,1248,320,1152,320C1056,320,960,320,
        864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</section>
{{-- End Hero --}}

{{-- Start Footer --}}
<footer class="text-white text-center pb-4 footer">
    <p class="text-light py-1">Copyright by: Nazal Gusti Prastya <i class="bi bi-arrow-through-heart-fill text-danger"></i><a href="https://www.instagram.com/nzlprst"class="text-light fw-bold"> Instagram</a></p>
</footer>
{{-- @endsection --}}



