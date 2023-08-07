@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <center>
        <table class="table table-hover table-bordered" id="table" name="table">
            <tr>
                <th>Date</th>
                <th>Username</th>
                <th>In</th>
                <th>Out</th>
                <th>Operations</th>
            </tr>
			<tbody id="myTable">
				@foreach ($result as $attendance)
                    <tr>
                        <td>
                            {{ $attendance->date }}
                        </td>
                        <td>
                            {{ $attendance->username }}
                        </td>
                        <td>
                            {{ $attendance->in }}
                        </td>
                        <td>
                            {{ $attendance->out }}
                        </td>
                        <td>
                            <a href="/admin/attendance/details/{{ $attendance->id }}">Details</a> |
                            
                            <a href="/admin/attendance/edit/{{ $attendance->id }}">Edit</a> | 
                        
                            <a href="/admin/attendance/delete/{{ $attendance->id }}">Delete</a>
                        </td>
                    </tr>
				@endforeach
			</tbody>
		</table>
		<br>
		<button class="btn btn-info block m-b" onclick="exportTableToCSV('attendance.csv')">Export To CSV File</button>
    </center>
@endsection