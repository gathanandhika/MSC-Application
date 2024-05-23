@extends('dashboard.dash-layout.main')

@section('container')

<div class="table-responsive col-lg-12">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Users</h1>
        </div>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <td> {{ $user->name }} </td>
            </tr>
            <tr>
              <th scope="col">Username</th>
              <td> {{ $user->username }} </td>
            </tr>
            <tr>
              <th scope="col">Email</th>
              <td> {{ $user->email }} </td>
            </tr>
            <tr>
               <th scope="col">No. Telepon</th>
              <td> {{ $user->no_telp }} </td>
            </tr>
            <tr>
                <th scope="col">Alamat</th>
              <td> {{ $user->alamat }} </td>
            </tr>
          </thead>
          <tbody>

          <tr>
          </tr>
          </tbody>
        </table>

        <a href="/dashboard/users" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Daftar Users</a>
                <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-warning"><span data-feather="edit-3"></span></a>
                <form action="/dashboard/users/{{ $user->id }} " method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger " onclick="return confirm('Are you sure for delete data?')"><span data-feather="trash"></span></button>
                </form>
      </div>

@endsection