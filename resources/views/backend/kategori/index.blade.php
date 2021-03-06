@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Halaman Kategori </div>
                <br>
                <center><a href="{{ route('kategori.create') }}" class="btn btn-primary"> Tambah </a></center>
                <br>
                    <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th> No </th>
                            <th> Nama Kategori</th>
                            <th> Slug </th>
                            <th colspan="3" style="text-align: center;"> Aksi </th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($kategori as $data)
                            <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->nama_kategori}}</td>
                            <td>{{$data->slug}}</td>
                            <td><a href="{{ route('kategori.show',$data->id) }}" class="btn btn-warning"> Show </a></td>
                            <td><a href="{{ route('kategori.edit',$data->id) }}"class="btn btn-success"> Edit </a></td>
                            <td><form action="{{ route('kategori.destroy',$data->id) }}" method="POST">
                                
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