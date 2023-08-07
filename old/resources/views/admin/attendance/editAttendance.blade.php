@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h2>Update Attendance</h2>
    <hr />
    {{--  {!! Form::model($attendance, ['method' => 'PATCH','route' => ['AttendanceController.update', $attendance->id]]) !!}  --}}
    
	<form class="m-t" method="post" action="{{ route('trytoupdateattendance') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" value="{{ $data->id}}" id="id" name="id">
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Date</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="date" name="date" required="" value="{{ $data->date }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Username</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="username" name="username" required="" value="{{ $data->username }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Attendance</label></div>
                    <div class="col-md-10">
                        <select class="form-control" id="attendance" name="attendance" >
                            <option @if ($data->attendance == "0") selected="selected" @endif>0</option>
                            <option @if ($data->attendance == "1") selected="selected" @endif>1</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>In Time</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="in" name="in" placeholder="In Time" value="{{ $data->in }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Out Time</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="out" name="out" placeholder="Out Time" value="{{ $data->out }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left">
                        <input type="submit" value="Update" class="btn btn-primary block full-width m-b" />
                    </div>
                </div>
			</div>
        </form>
@endsection