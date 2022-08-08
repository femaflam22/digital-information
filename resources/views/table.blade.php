@extends('layout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Table Item</h4>
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Jenis Juara</th>
                        <th>Tingkat</th>
                        <th>Tanggal</th>
                        <th>Image</th>
                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($prestasi as $prestasi)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $prestasi->nis }}</td>
                        <td>{{ $prestasi->nama }}</td>
                        <td>{{ $prestasi->jurusan }}</td>
                        <td>{{ $prestasi->juara }}</td>
                        <td>{{ $prestasi->tingkat }}</td>
                        <td>{{ $prestasi->waktu }}</td>
                        <td><img src="/images/{{ $prestasi->image }}" width="100px"></td>
                        <td>
                            <form action="{{ route('prestasi.destroy',$prestasi->id) }}" method="POST">
                 
                  
                                <a class="btn btn-primary" href="{{ route('prestasi.edit',$prestasi->id) }}">Edit</a>
                 
                                @csrf
                                @method('DELETE')
                    
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection