@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.expense-category.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.expense-category.fields.name')</th>
                            <td field-key='name'>{{ $village->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.expense-category.fields.created-by')</th>
                            <td field-key='created_by'>{{ $village->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#expense" aria-controls="expense" role="tab" data-toggle="tab">villages</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="expense">
<table class="table table-bordered table-striped {{ count($villages) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.expense.fields.expense-category')</th>
                        <th>@lang('quickadmin.expense.fields.entry-date')</th>
                        <th>@lang('quickadmin.expense.fields.amount')</th>
                        <th>@lang('quickadmin.expense.fields.created-by')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($villages) > 0)
            @foreach ($villages as $village)
                <tr data-entry-id="{{ $village->id }}">
                    <td field-key='village'>{{ $village->village->name or '' }}</td>
                                <td field-key='entry_date'>{{ $village->entry_date }}</td>
                                <td field-key='amount'>{{ $village->amount }}</td>
                                <td field-key='created_by'>{{ $village->created_by->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('villages.show',[$village->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('villages.edit',[$village->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['villages.destroy', $village->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.village.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
