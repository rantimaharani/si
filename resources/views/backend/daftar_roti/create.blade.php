@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Tambah Data </div>

                    <div class="card-body">
                    <form action="{{route('daftar_roti.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""> Nama </label>
                            <input class="form-control" type="text" name="nama_roti">
                        </div>

                        <div class="from-group">
                            <label for=""> Kategori </label>
                            <select name="id_kategori" class="form-control" required>
                                @foreach ($kategori as $data )
                                    <option value="{{ $data->id }}"> {{ $data->nama_kategori }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for=""> Deskripsi </label>
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for=""> Foto </label>
                            <input class="form-control
                            @error('foto') is-invalid @enderror" type="file"
                            name="foto" id="" required>
                            @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
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

                  