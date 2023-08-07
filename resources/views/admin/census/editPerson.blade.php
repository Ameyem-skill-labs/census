@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h2>Update Employee</h2>
    <hr />
	    <form class="m-t" method="post" action="{{ url('/admin/trytoupdateemployee') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" value="{{ $data->id}}" id="id" name="id">
            <div class="form-horizontal">
				<div class="form-group">
				    <div class="col-md-10" align="left"><label>Name</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="name" name="name" required="" placeholder="Full Name" value="{{ $data->email }}">
                    </div>
				</div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Username</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="username" name="username" required="" placeholder="Username" value="{{ $data->username }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Position</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="position" name="position" required="" placeholder="Position" value="{{ $data->position }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Admin Role</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="checkBox" id="admin" name="admin" placeholder="Position" value="{{ $data->admin }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Email</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="email" id="email" name="email" required="" placeholder="Email" value="{{ $data->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Password</label></div>
                    <div class="col-md-10">
                        <input class="form-control" type="password" id="password" name="password" required="" placeholder="Password" value="{{ $data->password }}"></input>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left">
                        <input type="submit" value="Update" class="btn btn-primary block full-width m-b" />.
                    </div>
                </div>
			</div>
        </form>
@endsection