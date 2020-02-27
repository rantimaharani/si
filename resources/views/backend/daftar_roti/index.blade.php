@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Daftar Roti </div>
                <br>
                <center><a href="{{ route('daftar_roti.create') }}" class="btn btn-primary"> Tambah </a></center>
                <br>
                    <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th> No </th>
                            <th> Nama Roti </th>
                            <th> Kategori </th>
                            <th> Foto </th>
                            <th> Deskripsi </th>
                            <th> Slug </th>
                            <th colspan="3" style="text-align: center;"> Aksi </th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($daftar_roti as $data)
                            <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->nama_roti}}</td>
                            <td>{{$data->kategori->nama_kategori}}</td>
                            <td><img src="{{asset('assets/img/daftar_roti/' .$data->foto. '')}}"
                                style="width:120px; height:120px;"></td>
                            <td>{{$data->deskripsi}}</td>
                            <td>{{$data->slug}}</td>
                            <td><a href="{{ route('daftar_roti.show',$data->id) }}" class="btn btn-warning"> Show </a></td>
                            <td><a href="{{ route('daftar_roti.edit',$data->id) }}"class="btn btn-success"> Edit </a></td>
                            <td><form action="{{ route('daftar_roti.destroy',$data->id) }}" method="POST">
                                
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit"> Hapus </button>
                            </form>
                            </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection