@extends('dashboard.dash-layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Users</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success " role="alert">
  {{ session ('success') }}
</div>
@endif

<div class="table-responsive col-lg-12">
  <a href="/dashboard/users/create" class="btn btn btn-success mb-3"> Tambah User</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Username</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">No. Telepon</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>

          @foreach ($users as $user)
          <tr>
              <td> {{ $loop->iteration }} </td>
              <td> {{ $user->username }} </td>
              <td> {{ $user->name }} </td>
              <td> {{ $user->email }} </td>
              <td> {{ $user->no_telp }} </td>
              <td> {{ $user->role }} </td>
              <td>  
                <a href="/dashboard/users/{{ $user->id }} " class="badge bg-success link-no-decoration"><span data-feather="eye"></span> Show</a>
                <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning link-no-decoration"><span data-feather="edit-3"></span> Edit</a>
                <form action="/dashboard/users/{{ $user->id }} " method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0 link-no-decoration" onclick="return confirm('Are you sure for delete data?')"><span data-feather="trash"></span> Delete</button>
                </form>
              </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>
@endsection