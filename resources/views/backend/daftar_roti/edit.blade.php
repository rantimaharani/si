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
                <div class="card-header"> Mengubah Daftar Roti</div>

                    <div class="card-body">
                    <form action="{{route('daftar_roti.update',$daftar_roti->id)}}" method="post">
                            {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group">
                        <label for=""> Nama Roti </label>
                        <input class="form-control" value="{{ $daftar_roti->nama_roti }}" type="text" name="nama_roti">
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
                            <label for="">Foto</label>
                            @if (isset($daftar_roti) && $daftar_roti->foto)
                            <p>
                                <img src="{{ asset('assets/img/daftar_roti/'
                                .$daftar_roti->foto.'') }}"
                                style="margin-top:15px;margin-bottom:15px;
                                max-height:100px; border:1px; border-color:black;">
                                </p>
                                @endif
                            <input class="form-control{{ $errors->has('foto') ? ' has-error' : '' }}" type="file"
                            name="foto" id="" value="{{ $daftar_roti->foto }}">
                            @if ($errors->has('foto'))
                        <span class="help-block">
                            <strong>{{ $errors->first('foto') }}</strong>
                        </span>
                    @endif
                        </div>

                        <div class="form-group">
                            <label for=""> Deskripsi </label>
                            <input class="form-control" value="{{ $daftar_roti->deskripsi }}" type="text" name="deskripsi" id="" cols="30" rows="10">
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-outline-info">
                            Simpan 
                        </button>
                        </div>
                        
                        <div class="form-group">
                        <a href="{{ route('daftar_roti.index') }}" class="btn btn-outline-info"> Kembali </a>
                        </div>

                    </form>
                        </div>
                            </div>
                                </div>
                                    </div>
                                        </div>
                                            @endsection

                  


