@extends('layouts.app')

@section('content')

    <h3 class="page-title">Monthly Report</h3>

    {!! Form::open(['method' => 'get']) !!}
        <div class="row">
            <div class="col-xs-1 col-md-1 form-group">
                {!! Form::label('year','Year',['class' => 'control-label']) !!}
                {!! Form::select('y', array_combine(range(date("Y"), 1900), range(date("Y"), 1900)), old('y', Request::get('y', date('Y'))), ['class' => 'form-control']) !!}
            </div>
            <div class="col-xs-2 col-md-2 form-group">
                {!! Form::label('month','Month',['class' => 'control-label']) !!}
                {!! Form::select('m', cal_info(0)['months'], old('m', Request::get('m', date('m'))), ['class' => 'form-control']) !!}
            </div>
            <div class="col-xs-4">
                <label class="control-label">&nbsp;</label><br>
                {!! Form::submit('Select month',['class' => 'btn btn-primary']) !!}
            </div>
        </div>

@stop