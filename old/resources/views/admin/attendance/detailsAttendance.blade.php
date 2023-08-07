@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <center>
    <!-- <h3 class="page-title">@lang('quickadmin.detailsattendance.title')</h3> -->
        <h1>Details Attendance</h1>
	    <hr />
	        <table class="table table-striped" style="max-width: 50%" id="table">
                <tr>
                    <th><lable><font size="2">Date</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->date}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Employee</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->username}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">In Time</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->in}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Out Time</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->out}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Created at</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->created_at}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Updated at</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->updated_at}}</font></td>
                </tr>
	        </table>
        </center>
@endsection