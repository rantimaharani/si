@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Tambah Data </div>

                    <div class="card-body">
                    <form action="{{route('kategori.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for=""> Nama </label>
                            <input class="form-control" type="text" name="nama_kategori">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-info"> Simpan </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

                  