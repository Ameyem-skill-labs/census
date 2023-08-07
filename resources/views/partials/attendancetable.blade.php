<center>
<div class="table-responsive">
        <table class="table table-hover table-bordered {{ count($attendances) > 0 ? 'datatable' : '' }}">
           <thead> <tr>
                <th>Date</th>
                <th>Username</th>
                <th>In</th>
                <th>Out</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($attendances as $attendance)
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
                            {{--  <a href="/admin/attendance/details/{{ $attendance->id }}">Details</a> |  --}}
                            <a class="btn btn-info btn-xs" href="{{ route('attendance.show',$attendance->id) }}">Details</a>
                            {{--  <a href="/admin/attendance/edit/{{ $attendance->id }}">Edit</a> |   --}}
                            <a class="btn btn-primary btn-xs" href="{{ route('attendance.edit',$attendance->id) }}">Edit</a> 
                            <a class="btn btn-danger btn-xs" href="{{ route('deleteattendance',$attendance->id) }}">Delete</a> 
                            {{--  <a href="/admin/attendance/delete/{{ $attendance->id }}">Delete</a>  --}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
		</table>
        </div>
        <br>
        <button class="btn btn-info block m-b" onclick="exportTableToCSV('attendance.csv')">Export To CSV File</button>
    </center>