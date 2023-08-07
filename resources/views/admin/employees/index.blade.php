@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h2>Employee</h2>
        <center>
            <table class="table table-hover table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Operation</th>
                </tr>
				<tbody id="myTable">
					@foreach ($employees as $employee)
					    <tr>
                            <td>
                                {{ $employee->name }}
                            </td>
                            <td>
                                {{ $employee->username }}
                            </td>
                            <td>
                                {{ $employee->position }}
                            </td>
                            <td>
                                {{ $employee->email }}
                            </td>
                            <td>
                                <a href="/admin/employee/details/{{ $employee->id }}">Details</a> |
                                
                                <a href="/admin/employee/edit/{{ $employee->id }}">Edit</a> | 
                            
                                <a href="/admin/employee/delete/{{ $employee->id }}">Delete</a>
                            </td>
					    </tr>
					@endforeach
				</tbody>
			</table>
			<br>
			<button class="btn btn-info block m-b" onclick="exportTableToCSV('employees.csv')">Export To CSV File</button>
        </center>
@endsection