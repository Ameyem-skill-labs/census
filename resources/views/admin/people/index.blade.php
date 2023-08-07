@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.people.title')</h3>
    @can('person_create')
    <p>
        <a href="{{ route('admin.people.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
        @if(!is_null(Auth::getUser()->role_id) && config('quickadmin.can_see_all_records_role_id') == Auth::getUser()->role_id)
            @if(Session::get('People.filter', 'all') == 'my')
                <a href="?filter=all" class="btn btn-default">Show all records</a>
            @else
                <a href="?filter=my" class="btn btn-default">Filter my records</a>
            @endif
        @endif
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($people) > 0 ? 'datatable' : '' }} @can('person_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('person_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.expense-category.fields.name')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($people) > 0)
                        @foreach ($people as $person)
                            <tr data-entry-id="{{ $person->id }}">
                                @can('person_delete')
                                    <td></td>
                                @endcan

                                <td field-key='name'>{{ $person->peru }}</td>
                                <td>
                                    @can('person_view')
                                    <a href="{{ route('admin.people.show',[$person->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('person_edit')
                                    <a href="{{ route('admin.people.edit',[$person->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('person_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.people.destroy', $person->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

 @section('javascript')
    <script>
        @can('person_delete')
            window.route_mass_crud_entries_destroy = '{{ route('people.mass_destroy') }}';
        @endcan

    </script>
@endsection