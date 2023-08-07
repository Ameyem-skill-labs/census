


















@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.villages.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.villages.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <form>
                        <p></p>
                        <div class="form-group mb-3">
                            <select  id="state-dd" class="form-control">
                                <option value="">Select State</option>
                                @foreach ($states as $data)
                                <option value="{{$data->id}}">
                                    {{$data->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <select id="district-dd" class="form-control">
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="mandal-dd" class="form-control">
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

                <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    {!! Form::label('name', trans('quickadmin.villages.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}

                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif

                    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    
                </div>
            </div>
            
        </div>
    </div>
    {!! Form::close() !!}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#district-dd").html('');
                $.ajax({
                    url: "{{url('admin/api/fetch-districts')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#district-dd').html('<option value="">Select District</option>');
                        $.each(res.districts, function (key, value) {
                            $("#district-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

            $('#district-dd').on('change', function () {
                var idState = this.value;
                $("#mandal-dd").html('');
                $.ajax({
                    url: "{{url('admin/api/fetch-mandals')}}",
                    type: "POST",
                    data: {
                        district_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#mandal-dd').html('<option value="">Select Mandal</option>');
                        $.each(res.mandals, function (key, value) {
                            $("#mandal-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

            $('#mandal-dd').on('change', function () {
                var idState = this.value;
                $("#mandal-dd").html('');
                $.ajax({
                    url: "{{url('admin/api/fetch-mandals')}}",
                    type: "POST",
                    data: {
                        mandal_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#mandal-dd').html('<option value="">Select Mandal</option>');
                        $.each(res.mandals, function (key, value) {
                            // $("#selectmandal-dd").append('<option value="' + value.id + '">' + value.name + '</option>');
                            $("#selectmandal-dd").append('<input type="text" name="mandal_id" class="form-control" value="'+idState+'"> ') 
                        });
                    }
                });
            });
        });
    </script>
            
        

    
@stop



