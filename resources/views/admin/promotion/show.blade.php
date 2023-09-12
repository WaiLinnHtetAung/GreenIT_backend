@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.promotion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.title') }}
                        </th>
                        <td>
                            {{ $promotion->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.image') }}
                        </th>
                        <td>
                            @foreach ($promotion->getMedia('promotion_image') as $media)
                                <img src="{{ $media? $media->getUrl() : '' }}" width="60px" height="60px" alt="">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.logo') }}
                        </th>
                        <td>
                            @foreach ($promotion->getMedia('promotion_logo') as $media)
                                <img src="{{ $media? $media->getUrl() : '' }}" width="60px" height="60px" alt="">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.content') }}
                        </th>
                        <td>
                            {!! $promotion->content !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group mt-4">
                <a class="btn btn-secondary" href="{{ route('admin.promotions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
