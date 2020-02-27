@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Halaman Informasi </div>
                <br>
                <center><a href="{{ route('informasi.create') }}" class="btn btn-primary"> Tambah </a></center>
                <br>
                    <div class="table-responsive">
                        <table class="table">
                        <tr>
                            <th> No </th>
                            <th> Sejarah Roti </th>
                            <th> Pengertian Roti </th>
                            <th> Manfaat Roti </th>

                            <th colspan="3" style="text-align: center;"> Aksi </th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($informasi as $data)
                            <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->sejarah}}</td>
                            <td>{{$data->pengertian}}</td>
                            <td>{{$data->manfaat}}</td>
                            
                            <td><a href="{{ route('informasi.show',$data->id) }}" class="btn btn-warning"> Show </a></td>
                            <td><a href="{{ route('informasi.edit',$data->id) }}"class="btn btn-success"> Edit </a></td>
                            <td><form action="{{ route('informasi.destroy',$data->id) }}" method="POST">
                                
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