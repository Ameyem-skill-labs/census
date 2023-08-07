@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <center>
        <h1>Details Employee</h1>
	    <hr />
	    <table class="table table-striped" style="max-width: 50%">
            <tr>
                <th><lable><font size="2">Name</font></lable></th>
                <td>: &nbsp;<font size="2">{{ $data->name}}</font></td>
            </tr>
            <tr>
                <th><lable><font size="2">Username</font></lable></th>
                <td>: &nbsp;<font size="2">{{ $data->username}}</font></td>
            </tr>
            <tr>
                <th><lable><font size="2">Position</font></lable></th>
                <td>: &nbsp;<font size="2">{{ $data->position}}</font></td>
            </tr>
            <tr>
                <th><lable><font size="2">Admin Role</font></lable></th>
                <td>: &nbsp;<font size="2">{{ $data->admin}}</font></td>
            </tr>
            <tr>
                <th><lable><font size="2">Email</font></lable></th>
                <td>: &nbsp;<font size="2">{{ $data->email}}</font></td>
            </tr>
            <tr>
                <th><lable><font size="2">Password</font></lable></th>
                <td>: &nbsp;<font size="2">{{ $data->password}}</font></td>
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