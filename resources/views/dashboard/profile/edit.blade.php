@extends('dashboard.layouts.main')
@section('container')
    <h2 class="mt-3">Edit Profile</h2>
    <form action="/dashboard/profile/{{ auth()->user()->id }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Nama User</label>
            <input type="text" class="form-control @error('name')
                is-invalid
            @enderror" id="name" name="name" required value="{{ old('name',auth()->user()->name) }}">
            @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-3">
              <label for="jurusan" class="form-label">Jurusan</label>
              <select class="form-select" name="jurusan">
                @if (old('jurusan', auth()->user()->jurusan))
                  <option value="{{ auth()->user()->jurusan }}" selected>{{ auth()->user()->jurusan }}</option>
                  <option value="Pengembangan Perangkat Lunak dan Game">Pengembangan Perangkat Lunak dan Game</option>
                  <option value="Animasi">Animasi</option>
                  <option value="Broadcasting dan Perfilman">Broadcasting dan Perfilman</option>
                  <option value="Teknik Otomotif">Teknik Otomotif</option>
                  <option value="Teknik Pengelasan dan Fertilasi Logam">Teknik Pengelasan dan Fentilasi Logam</option>
                @endif

              </select>
          </div>

          <div class="mb-3">
              <label for="kelas" class="form-label">Kelas</label>
              <select class="form-select" name="kelas">
                @if (old('kelas',auth()->user()->kelas))
                  <option value="{{ auth()->user()->kelas }}" selected>{{auth()->user()->kelas }}</option>
                <option value="X(1)">X(1)</option>
                <option value="X(2)">X(2)</option>
                <option value="X(3)">X(3)</option>
                <option value="XI(1)">XI(1)</option>
                <option value="XI(2)">XI(2)</option>
                <option value="XI(3)">XI(3)</option>
                <option value="XII(1)">XII(1)</option>
                <option value="XII(2)">XII(2)</option>
                <option value="XII(3)">XII(3)</option>
                @endif   
             </select>
          </div>
          <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jenis_kelamin">
                @if (old('jenis_kelamin',auth()->user()->jenis_kelamin))
                <option value="{{auth()->user()->jenis_kelamin }}">{{auth()->user()->jenis_kelamin }}</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>  
                @endif

              </select>
          </div>

          <div class="mb-3">
              <label for="NIS" class="form-label">Nomor Induk Siswa</label>
              <input type="text" class="form-control @error('NIS')
                  is-invalid
              @enderror" id="NIS" name="NIS" required value="{{ old('NIS', auth()->user()->NIS) }}">
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
              @enderror" id="agama" name="agama" required value="{{ old('agama',auth()->user()->agama) }}">
              @error('agama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email')
                  is-invalid
              @enderror" id="email" name="email" required value="{{ old('email',auth()->user()->email) }}">
              @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
          <button type="submit" class="btn text-white" style="background-color: #1d050b">Save</button>
   </form>
@endsection