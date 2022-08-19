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
                    Mohon untuk melengkapi input form
                </p>
                <form class="forms-sample" action="{{route('update-item', $item['id'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Judul<span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" name="title" id="title" placeholder="Contoh : Profile Wikrama" value="{{$item['title']}}">
                        @if ($errors->has('title'))
                            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="order">Urutan Tampil<span class="text-danger">*</span></label>
                        <select class="custom-select {{$errors->has('order') ? 'is-invalid' : ''}}" id="order" name="order">
                            @for ($i = 1; $i <= $total; $i++)
                                @if ($i == $total)
                                    <option value="{{$i}}" {{ $item['order'] == $i ? 'selected' : '' }}>{{$i}} - (draf sebelum bertukar order dengan item lain)</option>
                                @else
                                    <option value="{{$i}}" {{ $item['order'] == $i ? 'selected' : '' }}>{{$i}}</option>
                                @endif
                            @endfor
                        </select>
                        @if ($errors->has('order'))
                            <div class="invalid-feedback">{{ $errors->first('order') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $item['status'] ? 'checked' : '' }}>
                            <label class="custom-control-label" for="status">Status Keaktifan<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="form-group" style="display: flex; flex-direction: column">
                        <label>Gambar</label>
                        <img src="{{asset('images/'.$item['image'])}}"  width="200" class="py-3">
                        <input type="file" name="image" class="form-control file-upload-info" placeholder="Upload Image">
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Info Tambahan</label>
                        @if ($item['desc'] !== '-')
                            <textarea id="desc-form" name="desc">{{$item['desc']}}</textarea>
                        @else
                            <textarea id="desc-form" name="desc"></textarea>
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