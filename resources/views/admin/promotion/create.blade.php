@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.promotion.title') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.promotions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row my-3">
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-4">
                    <label class="required" for="title">{{ trans('cruds.promotion.fields.title') }}</label>
                    <input class="form-control" type="text" name="title" value="{{ old('title', '') }}" required>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-4">
                    <label class="required" for="image">{{ trans('cruds.promotion.fields.image') }}</label>
                    <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" id="image" value="{{ old('image') }}"  required>
                    @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-4">
                    <label class="required" for="logo">{{ trans('cruds.promotion.fields.logo') }}</label>
                    <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}" type="file" name="logo" id="logo" value="{{ old('logo') }}"  required>
                    @if($errors->has('logo'))
                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                    @endif
                </div>
                <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-4">
                    <label class="required" for="content">{{ trans('cruds.promotion.fields.content') }}</label>
                    <textarea name="content" id="" cols="30" rows="10" class="cke-editor" >{{ old('content', '') }}</textarea>
                    @if($errors->has('content'))
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group ">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '.cke-editor' ) )
            .catch( error => {
                console.error( error );
        } )
    </script>
@endsection
