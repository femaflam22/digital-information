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
                      <tr class="text-center font-weight-bold">
                        <th> # </th>
                        <th> Judul </th>
                        <th>
                          Deskripsi
                        </th>
                        <th> Gambar </th>
                        <th> Aksi </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $item)
                          <tr>
                            <td class="text-center">{{$no++}}</td>
                            <td>{{$item->title}}</td>
                            <td>{!! $item->desc !!}</td>
                            <td><img src="{{asset('images/'.$item->image)}}" style="border-radius: 0 !important"></td>
                            <td class="d-flex justify-content-center">
                                <a href="{{route('edit-item',$item->id)}}" class="btn btn-info" style="margin-right: 10px !important">Edit</a>
                                <form action="{{ route('delete-item',$item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                          </tr>
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