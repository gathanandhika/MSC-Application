@extends('dashboard.dash-layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Customers</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/users">
    @csrf
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username') }}">
    @error('username')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
    @error('password')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
    @error('name')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
    @error('email')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="no_telp" class="form-label">Nomor Telepon</label>
    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" required value="{{ old('no_telp') }}">
    @error('no_telp')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat') }}">
    @error('alamat')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="role" class="form-label">Posisi</label>
    <select name="role" class="form-control @error('role') is-invalid @enderror">
      <option value=""> Pilih Posisi </option>
      <option value="Administrator"> Administrator </option>
      <option value="Pelanggan"> Pelanggan </option>
    </select>
    @error('role')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn btn-secondary mt-3">Submit</button>
  </div>

</div>

@endsection