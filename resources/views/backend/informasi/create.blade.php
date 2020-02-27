@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Tambah Data Informasi </div>

                    <div class="card-body">
                    <form action="{{route('informasi.store')}}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for=""> Sejarah </label>
                            <textarea class="form-control" name="sejarah" id="" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for=""> Pengertian </label>
                            <textarea class="form-control" name="pengertian" id="" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for=""> Manfaat </label>
                            <textarea class="form-control" name="manfaat" id="" cols="30" rows="5"></textarea>
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

                  