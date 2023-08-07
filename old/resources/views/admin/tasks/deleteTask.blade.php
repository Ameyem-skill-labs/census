@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <center>
        <h1 style="color: red">Are you sure to DELETE this Task ?</h1>
	    <hr />
	        <table class="table table-striped" style="max-width: 50%">
                <tr>
                    <th width="10"><lable><font size="2">Task Name</font></lable></th>
                    <td>: &nbsp;<font size="2">{{ $data->name}}</font></td>
                </tr>
                <tr>
                    <th width="10"><lable><font size="2">Assigned To</font></lable></th>
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
                    <td colspan="2">
                        <form class="m-t" method="post" action="{{ route('trytodeletetask') }}">
                            <input type = "hidden" name = "_token" value = "{{ csrf_token() }}">
                            <div class="form-horizontal">
                                <input type="hidden" value="{{ $data->id}}" id="id" name="id">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger block full-width m-b" value="Delete"/>.
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
	        </table>
    </center>
@endsection