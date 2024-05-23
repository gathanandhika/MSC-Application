@extends('dashboard.dash-layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Lapangan</h1>
</div>


<div class="col-lg-8">
<form method="post" action="/dashboard/lapangans">
    @csrf
  <div class="mb-3">
    <label for="nama_lapangan" class="form-label">Nama Lapangan</label>
    <input type="text" class="form-control @error('nama_lapangan') is-invalid @enderror" id="nama_lapangan"  name="nama_lapangan" required value="{{ old('nama_lapangan') }}">
    @error('nama_lapangan')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-3">
  <label for="detail" class="form-label">Detail</label>
    <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail" required name="detail" value="{{ old('detail') }}">
    @error('detail')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="harga_sewa" class="form-label">Biaya sewa/jam</label>
    <input type="text" class="form-control @error('harga_sewa') is-invalid @enderror" id="harga_sewa" required name="harga_sewa" value="{{ old('harga_sewa') }}">
    @error('harga_sewa')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <button type="submit" class="btn btn btn-secondary mt-3">Submit</button>


</div>

@endsection