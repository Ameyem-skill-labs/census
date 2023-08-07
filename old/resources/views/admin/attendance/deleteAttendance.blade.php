@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <center>
        <h1 style="color: red">Are you sure to DELETE this Attendance ?</h1>
	    <hr />
	    <table class="table table-striped" style="max-width: 50%">
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
            <tr>
                <td colspan="2">
                    <form class="m-t" method="post" action="{{ route('trytodeleteattendance') }}">
                        <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                        <div class="form-horizontal">
                            <input type="hidden" value="{{ $data->id}}" id="id" name="id">
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger block full-width m-b" value="Delete"/>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
	    </table>
    </center>
@endsection