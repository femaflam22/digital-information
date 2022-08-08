@extends('layout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Table Item</h4>
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th> # </th>
                        <th> Lomba </th>
                        <th> Tanggal </th>
                        <th>
                          Peserta
                        </th>
                        <th> Gambar </th>
                        <th> Aksi </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($datas as $data)
                          <td>{{$no++}}</td>
                          <td>{{$data->name}}</td>
                          <td>{{$data->date}}</td>
                          <td>{!! $data->students !!}</td>
                          <td><img src="{{asset('images/'.$data->image)}}" width="100px"></td>
                            <td class="d-flex justify-content-center">
                                <a href="{{route('edit-prestasi',$data->id)}}" class="btn btn-info" style="margin-right: 10px !important">Edit</a>
                                <form action="{{ route('delete-prestasi',$data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection