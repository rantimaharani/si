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
                <div class="card-header"> Menampilkan Data Kategori </div>

                    <div class="card-body">
                            <div class="form-group">
                            <label for=""> Kategori </label>
                            <input class="form-control" value="{{$kategori->nama_kategori}}" type="text" name="nama_kategori" readonly>
                            </div>

                            <div class="from-group">
                            <a href="{{ route('kategori.index') }}" class="btn btn-outline-info"> Kembali </a>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
