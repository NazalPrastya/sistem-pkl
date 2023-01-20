@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Perusahaan Baru</h1>
    </div> 

    <div class="col-lg-8">
        <form action="/dashboard/company/{{ $company->id }}" method="post">
            @method('put')
        @csrf
        <div class="mt-3">
            <label for="nama_perusahaan">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control @error('nama_perusahaan')
                is-invalid
            @enderror" id="nama_perusahaan" placeholder="Masukan Nama Perusahaan" value="{{ old('nama_perusahaan', $company->nama_perusahaan) }}">
            @error('nama_perusahaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mt-3">
            <label for="nama_directur">Nama Directur</label>
            <input type="text" name="nama_directur" class="form-control @error('nama_directur')
                is-invalid
            @enderror" id="nama_directur" placeholder="Masukan Nama Directur" value="{{ old('nama_directur', $company->nama_directur) }}">
            @error('nama_directur')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mt-3">
            <label for="bidang">Bidang</label>
            <input type="text" name="bidang" class="form-control @error('bidang')
                is-invalid
            @enderror" id="bidang" placeholder="Masukan Bidang" value="{{ old('bidang', $company->bidang) }}">
            @error('bidang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mt-3">
            <label for="jumlah_karyawan">Nama Jumlah Karyawan</label>
            <input type="text" name="jumlah_karyawan" class="form-control @error('jumlah_karyawan')
                is-invalid
            @enderror" id="jumlah_karyawan" placeholder="Masukan Jumlah Karyawan" value="{{ old('jumlah_karyawan', $company->jumlah_karyawan) }}">
            @error('jumlah_karyawan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        
        <div class="mt-3">
            <label for="alamat">Nama Alamat</label>
            <input type="text" name="alamat" class="form-control @error('alamat')
                is-invalid
            @enderror" id="alamat" placeholder="Masukan Alamat" value="{{ old('alamat', $company->alamat) }}">
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <button type="submit" class="btn text-white mt-4" style="background-color: #1d050b">Update</button>
        </form>
    </div>
@endsection