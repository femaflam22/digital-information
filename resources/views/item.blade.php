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
                <h4 class="card-title">Upload Item</h4>
                <p class="card-description">
                    Mohon untuk melengkapi input form bertanda <span class="text-danger">*</span>
                </p>
                <form class="forms-sample" action="{{route('item')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul<span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" id="title" placeholder="Contoh : Profile Wikrama">
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Gambar<span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control file-upload-info {{$errors->has('image') ? 'is-invalid' : ''}}" placeholder="Upload Image">
                        @if ($errors->has('image'))
                            <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Info Tambahan</label>
                        <textarea id="desc-form" name="desc"></textarea>
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