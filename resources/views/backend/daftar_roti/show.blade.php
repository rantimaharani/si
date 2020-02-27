@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset ('js/select2.min.js') }}"> </script>
    <script src="{{ asset ('app/assets/js/components/select2.init.js') }}"> </script>
    <script src="{{ asset ('app/assets/vendor/ckeditor/ckeditor.js') }}"> </script>
<script>
    CKEDITOR.replace('editor');

    $(document).ready(function() {
        $(#select2).select2();
    });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Menampilkan Daftar Roti </div>

                    <div class="card-body">
                            <div class="form-group">
                            <label for=""> Nama Roti </label>
                            <input class="form-control" value="{{$daftar_roti->nama_roti}}" type="text" name="nama_roti" readonly>
                            </div>

                            <div class="form-group">
                            <label for="">{{$daftar_roti->judul}}</label>
                            <label>{!!$daftar_roti->konten!!}</label> Kategori 
                            <input class="form-control" value="{{$daftar_roti->kategori->nama_kategori}}" type="text" name="nama_kategori" readonly>
                                </div>

                                <div class="form-group">
                                    <label for=""> Foto </label>
                                <div class="form-group">
                                    <img src="{{ asset('assets/img/daftar_roti/' .$daftar_roti->foto.'') }}"
                                    class="float-left rounded m-r-20 m-b-20" style="width:200x; height:200px;">
                            <div class="from-group">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>

                            <div class="form-group">
                                <label for=""> Deskripsi </label>
                                <input class="form-control" value="{{$daftar_roti->deskripsi}}" type="text" name="deskripsi" readonly>
                                </div>

                                <a href="{{ route('daftar_roti.index') }}" class="btn btn-outline-info"> Kembali </a>
                            </div>
                                
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
