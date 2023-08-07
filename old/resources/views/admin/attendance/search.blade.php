@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h2>Search Attendance</h2>
    <hr/>
        <form class="m-t" method="post" action="{{ route('byDate') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Date</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="date" name="date" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left">
                        <input type="submit" value="Search" class="btn btn-primary block full-width m-b" />
                    </div>
                </div>
            </div>
        </form>
        <br>
        <form class="m-t" method="post" action="{{ url('/admin/attendance/byMonth') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Month</label></div>
                    <div class="col-md-5">
                        <select class="form-control" id="month" name="month" >
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left">
                        <input type="submit" value="Search" class="btn btn-primary block full-width m-b" />
                    </div>
                </div>
            </div>
        </form>
        <br>
        <form class="m-t" method="post" action="{{ url('/admin/attendance/byYear') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Year</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="number" id="year" name="year" min="2018" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left">
                        <input type="submit" value="Search" class="btn btn-primary block full-width m-b" />
                    </div>
                </div>
            </div>
        </form>
        <br>
        <form class="m-t" method="post" action="{{ url('/admin/attendance/byUsername') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-horizontal">
                <div class="form-group">
                    <div class="col-md-10" align="left"><label>Username</label></div>
                    <div class="col-md-5">
                        <input class="form-control" type="text" id="username" name="username" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10" align="left">
                        <input type="submit" value="Search" class="btn btn-primary block full-width m-b" />
                    </div>
                </div>
            </div>
        </form>
@endsection