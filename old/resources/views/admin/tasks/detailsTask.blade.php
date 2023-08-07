@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <center>
        <h1>Details Task</h1>
	    <hr />
	        <table class="table table-striped" style="max-width: 50%">
                <tr>
                    <th width="21%"><lable><font size="2">Task Name</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->name}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Assigned To</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->to}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Assigned From</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->from}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Description</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->body}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Duration</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->duration}}</font></td>
                </tr>
                <tr>
                    <th><lable><font size="2">Status</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->status}}</font></td>
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