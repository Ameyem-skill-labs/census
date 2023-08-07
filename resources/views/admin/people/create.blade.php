
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.people.fields.create')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.people.store']]) !!}

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
                        <div class="form-group mb-3">
                            <select id="mandal-dd" class="form-control">
                            </select>
                        </div> 
                        <div class="form-group mb-3">
                            <select id="village-dd" class="form-control">
                            </select>
                            {{ Form::hidden('village_id', '1', array('id' => 'myid')) }}
                        </div>
                        <div class="form-group mb-3">
                            {!! Form::label('ward_no', trans('quickadmin.people.fields.ward_no').'*', ['class' => 'control-label']) !!}   
                            {!! Form::text('ward_no', old('ward_no'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            {!! Form::label('house_no', trans('quickadmin.people.fields.house_no').'*', ['class' => 'control-label']) !!}   
                            {!! Form::text('house_no', old('house_no'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-5">
                
                    {!! Form::label('intiperu', trans('quickadmin.people.fields.intiperu').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::text('intiperu', old('intiperu'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}

                    {!! Form::label('peru', trans('quickadmin.people.fields.peru').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::text('peru', old('peru'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p>   </p>   
                    {!! Form::label('gender', trans('quickadmin.people.fields.gender').'*', ['class' => 'control-label']) !!}   
                    {!! Form::select('gender', array('M' => 'Male', 'F' => 'Female','O'=>'Other'), 'M') !!}
                    <p>   </p>   
                    {!! Form::label('father_husb_name', trans('quickadmin.people.fields.father_husb_name').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::text('father_husb_name', old('father_husb_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                      
                    {!! Form::label('aadhaar', trans('quickadmin.people.fields.aadhaar').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::text('aadhaar', old('aadhaar'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    {!! Form::label('ration_card', trans('quickadmin.people.fields.ration_card').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::text('ration_card', old('ration_card'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    {!! Form::label('contact', trans('quickadmin.people.fields.contact').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::text('mobile', old('mobile'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                   
                    <p>   </p>
                    {!! Form::label('dob', trans('quickadmin.people.fields.dob').'*', ['class' => 'control-label']) !!}                         
                    {{ Form::date('dob'),['class' => 'form-control','required' => '']}}   
                    <p>   </p>                    
                    
                    {!! Form::label('edu_qualification', trans('quickadmin.people.fields.edu_qualification').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::select('edu_qualification_id', $edu_qulifications,) !!}
                    <p>   </p>

                    {!! Form::label('profession', trans('quickadmin.people.fields.profession').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::select('profession_id', $professions,) !!}
                    <p>   </p>
                    
                    {!! Form::label('pensoner_type', trans('quickadmin.people.fields.pensoner_type').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::select('pensoner_type_id', $pension_types,) !!}
                    
                    <p>   </p>
                    {!! Form::label('own_a_house', trans('quickadmin.people.fields.own_or_rent').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::select('own_a_house', array('1' => 'Own house', '0' => 'Rented/No House'), '1',) !!}
                    <p>   </p>
                    {!! Form::label('vehicle', trans('quickadmin.people.fields.vehicle').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::select('vehicle_type_id', $vehicle_types,) !!}
                    <p>   </p>                    

                    {!! Form::label('own_agri_land', trans('quickadmin.people.fields.agri_land').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::select('own_agri_land', array('1' => 'Yes', '0' => 'No'), '1',) !!}
                    <p>   </p>

                    {!! Form::label('land_area', trans('quickadmin.people.fields.land_area').'*', ['class' => 'control-label']) !!}                    
                    {!! Form::text('land_area','', [ 'placeholder' => '2.0', 'required' => '']) !!}                         

                    <p class="help-block"></p>
                    @if($errors->has('peru'))
                        <p class="help-block">
                            {{ $errors->first('peru') }}
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
        
        function ajaxCall(select_ele_id_str,db_id_str,retrieved_fields_identifier,dest_ele_id_str,url_str,disp_name){
         mystring=`$('${select_ele_id_str}').on('change', function () {
                var idState = this.value;
                $(${dest_ele_id_str}).html('');
                $.ajax({
                    url: "{{url('admin/api/${url_str}')}}",
                    type: "POST",
                    data: {
                        ${db_id_str}: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $(${dest_ele_id_str}).html('<option value="">Select ${disp_name}</option>');
                        $.each(${retrieved_fields_identifier}, function (key, value) {
                            $(${dest_ele_id_str}).append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });`;
            // console.log(mystring);
            eval(mystring);
        };
        
        $(document).ready(function () {

            // select_ele_id_str='#state-dd';
            // db_id_str='state_id';
            // retrieved_fields_identifier="res.districts";
            // dest_ele_id_str="'#district-dd'";
            // url_str='fetch-districts';
            // disp_name='District';
            // ajaxCall(select_ele_id_str,db_id_str,retrieved_fields_identifier,dest_ele_id_str,url_str,disp_name);

            ajaxCall('#state-dd','state_id',"res.districts","'#district-dd'",'fetch-districts','District');
            ajaxCall('#district-dd','district_id',"res.mandals","'#mandal-dd'",'fetch-mandals','Mandal');
            ajaxCall('#mandal-dd','mandal_id',"res.villages","'#village-dd'",'fetch-villages','Village');


            $('#village-dd').on('change', function () {
                var idVil = this.value;
                console.log('this is value',idVil);
                var y = document.getElementById("myid");
                y.setAttribute("value", idVil);
                });
        });
            
       
    </script>
            
        

    
@stop