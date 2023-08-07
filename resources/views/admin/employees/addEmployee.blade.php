@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h2>Create User</h2>
    <hr/>
    <form class="m-t" method="post" action="{{ url('/admin/trytoaddemployee') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Name</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="name" name="name" required="" placeholder="Full Name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Username</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="username" name="username" required="" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Position</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="position" name="position" required="" placeholder="Position">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Admin Role</label></div>
                    <div class="col-md-5">
                        <select class="form-control" id="admin" name="admin" >
                            <option>false</option>
                            <option>true</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Email</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="email" id="email" name="email" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Password</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="password" id="password" name="password" required="" placeholder="Password"></input>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="currency" class="col-md-4 control-label">Choose currency</label>

                    <div class="col-md-6">
                        <select name="currency" id="currency"  class="form-control" name="currency" required>
                            @foreach ($currencies as $currency)
                                <option value="{{$currency->id}}">{{$currency->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="col-md-10" align="left">
                        <input type="submit" value="Create" class="btn btn-primary block full-width m-b" />
                    </div>
                </div>
            </div>
    </form>
@endsection