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
                <div class="card-header"> Mengubah Data Informasi</div>

                    <div class="card-body">
                    <form action="{{route('informasi.update',$informasi->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group">
                        <label for=""> Sejarah Roti </label>
                        <input class="form-control" value="{{ $informasi->sejarah }}" type="text" name="sejarah">
                        </div>

                        <div class="form-group">
                            <label for=""> Pengertian Roti </label>
                            <input class="form-control" value="{{ $informasi->pengertian }}" type="text" name="pengertian">
                            </div>

                        <div class="form-group">
                            <label for=""> Manfaat Roti </label>
                            <input class="form-control" value="{{ $informasi->manfaat }}" type="text" name="manfaat">
                            </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-outline-info">
                            Simpan
                        </button>
                        </div>

                    </form>
                        </div>
                            </div>
                                </div>
                                    </div>
                                        </div>
                                            @endsection

                  


