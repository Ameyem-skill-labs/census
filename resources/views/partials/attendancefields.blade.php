<h3 class="page-title">@lang('quickadmin.addattendance.title')</h3>
       
        {!! Form::Open(array('route' => 'trytoaddattendance','method' => 'POST')) !!}
 
        <div class="panel-body table-responsive">
            {{--<div class="form-group" style="display:none">
                <div class="col-md-10" align="left"><label>Date</label></div>
                <div class="col-md-5">
                    <input class="form-control" type="text" id="date" value="{{date('Y-m-d')}}" name="date"  required="">
                </div>
            </div><br><hr>--}}
            <table class="table table-bordered table-striped">
            @lang('quickadmin.addattendance.fields.date')
            <input class="" type="date" id="" value="{{date('Y-m-d')}}" name="date"  required="">
                <thead>
                
                    <tr>
                        {{--  <th>@lang('quickadmin.addattendance.fields.date')</th>  --}}
                        <!-- <th>@lang('quickadmin.addattendance.fields.present')</th> -->
                        <th>@lang('quickadmin.addattendance.fields.username')</th>
                        <th>@lang('quickadmin.addattendance.fields.intime')</th>
                        <th>@lang('quickadmin.addattendance.fields.outtime')</th>
                        <th>@lang('quickadmin.addattendance.fields.present')</th>
                    </tr>
                </thead>
                <tbody>
                <!-- <h4 style="color:#336699"><input type="checkbox" id="select_all"/> Check all</h4> -->
                
                    @foreach ($users as $i => $user)
                        <tr>
                            {{--  <td><input class="" type="date" id="" value="{{date('Y-m-d')}}" name="date"  required=""></td>  --}}
                            

                            <td>{{ $i+1 }}. {{ $user }}
                            <input type="hidden"  id="" name="name[]" value="{{ $user }}">
                            </td>
                            <td>
                                {!! Form::text('in[]','9:00 AM',array('class' => '')) !!}
                            </td>
                            <td>
                                {!! Form::text('out[]','6:00 PM',array('class' => '')) !!}
                            </td>
                            
                            <td>
                            <input class="checkbox"  type="hidden" name="is_checked[{{$i}}]" value=0 />
                            <input class="checkbox" name="is_checked[{{$i}}]" value=1 type="checkbox"  checked>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
     
     {{--  <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
         <div class="form-group">
             <strong>Intime</strong>
                 {!! Form::text('in','9:00',array('class' => 'form-control')) !!}
         </div>
     </div>

     <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
         <div class="form-group">
             <strong>Outtime</strong>
                 {!! Form::text('out','6:00',array('class' => 'form-control')) !!}
         </div>
     </div>  --}}

     <div class="col-xs-12 col-sm-12 col-md-12" style="display:none">
         <div class="form-group">
             <strong>attendance</strong>
                 {!! Form::text('attendance','1',array('class' => 'form-control')) !!}
         </div>
     </div>
     
     <div class="form-group">
         <div class="col-md-10" align="left">
             <input type="submit" value="Create" class="btn btn-primary block full-width m-b" />
         </div>
     </div>
 </div>
{!! form::close() !!}