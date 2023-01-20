@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Pengajuan </h1>
    </div> 

    <form action="/dashboard/submission/{{$submission->id}}" method="post">
        @csrf
         @method('put')
        <div class="mb-3">
          <label for="nama" class="form-label">Nama </label>
          <input type="text" class="form-control @error('nama')
              is-invalid
          @enderror" id="nama" name="nama" value="{{ old('nama', $submission->nama) }}">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tgl_pengajuan" class="form-label">Tanggal Pengajuan</label>
            <input type="date" class="form-control @error('tgl_pengajuan')
                is-invalid
            @enderror" id="tgl_pengajuan" name="tgl_pengajuan" value="{{ old('tgl_pengajuan',$submission->tgl_pengajuan) }}">
            @error('tgl_pengajuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Tujuan/Judul</label>
            <input type="text" class="form-control @error('judul')
                is-invalid
            @enderror" id="judul" name="judul" value="{{ old('judul',$submission->judul) }}">
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pengajuan" class="form-label">Isi Pengajuan</label>
            <input id="pengajuan" type="hidden" name="pengajuan" required value="{{ old('pengajuan',$submission->pengajuan) }}" class="@error('pengajuan')
            is-invalid
            @enderror">
            <trix-editor input="pengajuan"></trix-editor>
            @error('pengajuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection