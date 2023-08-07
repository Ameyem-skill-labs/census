@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h2>person</h2>
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
					@foreach ($persons as $person)
					    <tr>
                            <td>
                                {{ $person->name }}
                            </td>
                            <td>
                                {{ $person->username }}
                            </td>
                            <td>
                                {{ $person->position }}
                            </td>
                            <td>
                                {{ $person->email }}
                            </td>
                            <td>
                                <a href="/admin/person/details/{{ $person->id }}">Details</a> |
                                
                                <a href="/admin/person/edit/{{ $person->id }}">Edit</a> | 
                            
                                <a href="/admin/person/delete/{{ $person->id }}">Delete</a>
                            </td>
					    </tr>
					@endforeach
				</tbody>
			</table>
			<br>
			<button class="btn btn-info block m-b" onclick="exportTableToCSV('persons.csv')">Export To CSV File</button>
        </center>
@endsection