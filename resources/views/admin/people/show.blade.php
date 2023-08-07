@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.people.title')</h3>

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
                            <td field-key='name'>{{ $person->peru }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.expense-category.fields.created-by')</th>
                            <td field-key='created_by'>{{ $person->created_by->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#expense" aria-controls="expense" role="tab" data-toggle="tab">people</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="expense">

</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.people.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
