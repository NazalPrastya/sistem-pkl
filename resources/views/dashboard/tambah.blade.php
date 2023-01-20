@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambahkan User Baru</h1>
    </div>   

    <div class="col-lg-8">
        <form method="post" action="/dashboard/user" class="mb-5">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama User</label>
              <input type="text" class="form-control @error('name')
                  is-invalid
              @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
              @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" name="jurusan">
                  <option value="Pengembangan Perangkat Lunak dan Game">Pengembangan Perangkat Lunak dan Game</option>
                  <option value="Animasi">Animasi</option>
                  <option value="Broadcasting dan Perfilman">Broadcasting dan Perfilman</option>
                  <option value="Teknik Otomotif">Teknik Otomotif</option>
                  <option value="Teknik Pengelasan dan Fertilasi Logam">Teknik Pengelasan dan Fentilasi Logam</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-select" name="kelas">
                    <option value="X(1)">X(1)</option>
                    <option value="X(2)">X(2)</option>
                    <option value="X(3)">X(3)</option>
                    <option value="XI(1)">XI(1)</option>
                    <option value="XI(2)">XI(2)</option>
                    <option value="XI(3)">XI(3)</option>
                    <option value="XII(1)">XII(1)</option>
                    <option value="XII(2)">XII(2)</option>
                    <option value="XII(3)">XII(3)</option>
                    {{-- <option value="XI Animasi 1">XI Animasi 1</option> --}}
                    {{-- <option value="XI Animasi 2">XI Animasi 2</option>
                    <option value="XI BCF 1 ">XI BCF 1</option>
                    <option value="XI BCF 2">XI BCF 2</option>
                    <option value="XI TO 1">XI TO 1</option>
                    <option value="XI TO 2">XI TO 2</option>
                    <option value="XI TPFL 1">XI TPFL 1</option>
                    <option value="XI TPFL 2">XI TPFL 2</option> --}}
                </select>
            </div>

            <div class="mb-3">
              <label for="company_id">Perusahaan</label>
              <select name="company_id" id="company_id" class="form-select">company_id
                <option value="0">Belum ada</option>
                @foreach ($companies as $company)
                    @if (old('company_id' == $company->id))
                      <option value="{{ $company->id }}" selected>{{ $company->nama_perusahaan }}</option>  
                    @else
                    <option value="{{ $company->id }}">{{ $company->nama_perusahaan }}</option>  

                    @endif
                @endforeach
              </select>
            </div>
            
            <div class="mb-3">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-select">Status
              <option value="Diterima">Diterima</option>
              <option value="Belum">Belum</option>
              </select>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="NIS" class="form-label">Nomor Induk Siswa</label>
                <input type="text" class="form-control @error('NIS')
                    is-invalid
                @enderror" id="NIS" name="NIS" required value="{{ old('NIS') }}">
                @error('NIS')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control @error('agama')
                    is-invalid
                @enderror" id="agama" name="agama" required value="{{ old('agama') }}">
                @error('agama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" id="alamat" cols="30" rows="5" required value="{{ old('alamat') }}" class="form-control"></textarea>

              <div class="mb-3">
                <label for="whatsapp" class="form-label">Nomor Whatsapp</label>
                <input type="text" class="form-control @error('whatsapp')
                    is-invalid
                @enderror" id="whatsapp" name="whatsapp" required value="{{ old('whatsapp') }}">
                @error('whatsapp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email')
                    is-invalid
                @enderror" id="email" name="email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password')
                    is-invalid
                @enderror" id="password" name="password" required value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <button type="submit" class="btn text-white"style="background-color: #1d050b">Tambah</button>
          </form>  
    </div>
@endsection