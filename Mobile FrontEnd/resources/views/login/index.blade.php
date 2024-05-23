@extends('login-layout.main')

@section ('container')

<style type="text/css">
    /* Mengubah warna fokus menjadi hijau */
    .form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }
</style>

<br><br><br>
<img src="/img/image 1.png " alt="logo" style="display: block; margin: auto; height:110px;">

<br>
    <h2 class="text-center">MAHENDRIK SPORT CENTRE</h2>
    <h5 class="h3 mb-5 fw-normal text-center">ADMINISTRATOR LOGIN</h5>

<div class="row justify-content-center">
  <div class="col-lg-4">

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
      </div>
    @endif  



    <main class="form-signin w-100 m-auto">
      <form action="/login" method="post">
        @csrf
        <div class="form-floating mb-2">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}" >
            <label for="email">Email</label>
            @error('email')
              <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>

        </div>
        <div class="checkbox mb-3">
          <label>
          </label>
        </div>
        <button class="w-100 btn btn btn-success" type="submit">Login</button>
      </form>                     
    </main>
  </div>
</div>


@endsection