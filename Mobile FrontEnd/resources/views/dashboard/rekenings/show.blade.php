@extends('dashboard.dash-layout.main')

@section('container')
<div class="container">
        <div class="row justify-content-center my-5 ">
            <div class="col-lg-11">
                <h1 class="mb-3">Nama: {{ $rekening->atas_nama }} </h1>  
                <p> Bank: {{ $rekening->nama_bank }}</p>
                <p> Nomor Rekening: {{ $rekening->no_rekening }} </p>

                <a href="/dashboard/rekenings" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke Daftar Rekening</a>
                <a href="/dashboard/rekenings/{{ $rekening->id }}/edit" class="btn btn-warning"><span data-feather="edit-3"></span></a>
                <form action="/dashboard/rekenings/{{ $rekening->id }} " method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger " onclick="return confirm('Are you sure for delete data?')"><span data-feather="trash"></span></button>
                </form>


            </div>
        </div>
    </div>


@endsection