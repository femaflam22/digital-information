@extends('layout')

@section('content')
<div class="content-wrapper">
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('failed'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ Session::get('failed') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic form elements</h4>
                <p class="card-description">
                Basic form elements
                </p>
                <form class="forms-sample" action="{{route('update-prestasi', $prestasi['id'])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Lomba<span class="text-danger">*</span></label>
                    <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="name" placeholder="Name" name="name" value="{{$prestasi['name']}}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="date">Tanggal Kegiatan<span class="text-danger">*</span></label>
                    <input type="date" class="form-control {{$errors->has('date') ? 'is-invalid' : ''}}" id="date" placeholder="Name" name="date" value="{{$prestasi['date']}}">
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $prestasi['status'] ? 'checked' : '' }}>
                        <label class="custom-control-label" for="status">Status Keaktifan<span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="form-group" style="display: flex; flex-direction: column">
                    <label>Gambar</label>
                    <img src="{{asset('images/'.$prestasi['image'])}}" width="200" class="py-3">
                    <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea1">Peserta</label>
                    @if ($prestasi['students'] !== '-')
                        <textarea class="form-control" id="desc-form" name="students">{{ $prestasi['students'] }}</textarea>
                    @else
                        <textarea class="form-control" id="desc-form" name="students"></textarea>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection