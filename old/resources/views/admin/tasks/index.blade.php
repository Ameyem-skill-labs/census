@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <center>
        <table class="table table-hover table-bordered">
            <tr>
                <th>Task Name</th>
                <th>Assigned To</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Operations</th>
            </tr>
			<tbody id="myTable">
				@foreach ($tasks as $task)
					<tr>
                        <td>
                            {{ $task->name }}
                        </td>
                        <td>
                            {{ $task->to }}
                        </td>
                        <td>
                            {{ $task->duration }}
                        </td>
                        <td>
                            {{ $task->status }}
                        </td>
                        <td>
                            <a href="/admin/task/details/{{ $task->id }}">Details</a> | 
                        
                            <a href="/admin/task/edit/{{ $task->id }}">Edit</a> | 
                        
                            <a href="/admin/task/delete/{{ $task->id }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <button class="btn btn-info block m-b" onclick="exportTableToCSV('tasks.csv')">Export To CSV File</button>
    </center>
@endsection