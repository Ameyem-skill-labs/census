@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.todayattendance.title')</h3>
    @include('partials.attendancetable')
@include('partials.attendancefields')
@endsection