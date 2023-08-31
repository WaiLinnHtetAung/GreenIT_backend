@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="custom-header">
        {{ trans('cruds.promotion.title') }} {{ trans('global.list') }}
        @can('promotion_create')
            <div style="margin-bottom: 10px;" class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('admin.promotions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.promotion.title') }}
                    </a>
                </div>
            </div>
        @endcan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-promotion">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.promotion.fields.no') }}
                        </th>
                        <th>
                            {{ trans('cruds.promotion.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.promotion.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.promotion.fields.content') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promotions as $key => $promotion)
                        <tr data-entry-id="{{ $promotion->id }}">
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                {{ $promotion->title ?? '' }}
                            </td>
                            <td>
                                <img src="{{ $promotion->media? $promotion->media[0]->getUrl() : '' }}" width="60px" height="60px" alt="">
                            </td>
                            <td>
                                {!! $promotion->content ?? '' !!}
                            </td>
                            <td class="text-nowrap">
                                @can('promotion_show')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            href="{{ route('admin.promotions.show', $promotion->id) }}">
                                            <i class='bx bx-show'></i>
                                        </a>
                                    @endcan

                                    @can('promotion_edit')
                                        <a class="p-0 glow"
                                            style="width: 26px;height: 36px;display: inline-block;line-height: 36px;color:grey;"
                                            href="{{ route('admin.promotions.edit', $promotion->id) }}">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                    @endcan

                                    @can('promotion_delete')
                                        <form
                                            action="{{ route('admin.promotions.destroy', $promotion->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            @method('delete')
                                            @csrf
                                            <button style="width: 26px;height: 36px;display: inline-block;line-height: 36px;border:none;color:grey;background:none;"
                                                class=" p-0 glow">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        let table = $('.datatable-promotion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })

</script>
@endsection
