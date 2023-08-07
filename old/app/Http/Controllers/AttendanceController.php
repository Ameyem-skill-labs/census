<?php

namespace App\Http\Controllers;

use App\User;
use App\attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use DB;

class AttendanceController extends Controller
{
    public function ucwordArray($musers){
        $users=array();
        foreach($musers as $u){
            array_push($users,ucwords($u));
        }
        return $users;
    }
    public function index(Request $request){
        
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d', time());

        $attendances = DB::table('attendances')->where('date', $date)->get();
            // return $attendances;
            // return view('admin.attendance.index', ['attendances' => $attendance]);
        $users = DB::table('users')->where('name', '<>', 'admin')->pluck('name');
        $users=$this->ucwordArray($users);
        // $users = User::all();
        // return $users;
            return view('admin.attendance.index',compact('attendances','users'));

        // return $request;
        // date_default_timezone_set('Asia/Dhaka');
        // $date = date('Y-m-d', time());


    }

    public function all(Request $request){
        
        $attendance = DB::table('attendances')->get();
            return view('admin.attendance.all', ['attendances' => $attendance]);
        
    }

    public function searchByDate(Request $request){
        
        $date = $request->input('date');
        $result = DB::table('attendances')->where('date', $date)->get();
            return view('admin.attendance.results', ['result' => $result]);
        
        // if($request->session()->has('currentUser')){
        //     $date = $request->input('date');
        //     $result = DB::table('attendances')->where('date', $date)->get();
        //     return view('admin.attendance.results', ['result' => $result]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function searchByMonth(Request $request){

        $month = $request->input('month');
        $m="%%%%-".$month."-%%";

        $result = DB::select('SELECT * FROM `attendances` WHERE `date` LIKE ?', [$m]);
            return view('admin.attendance.results', ['result' => $result]);
        

        // if($request->session()->has('currentUser')){
        //     $month = $request->input('month');
        //     $m="%%%%-".$month."-%%";

        //     $result = DB::select('SELECT * FROM `attendance` WHERE `date` LIKE ?', [$m]);
        //     return view('admin.attendance.results', ['result' => $result]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function searchByYear(Request $request){
        
        $year = $request->input('year');
        $y=$year."-%%-%%";
            
        $result = DB::select('SELECT * FROM `attendances` WHERE `date` LIKE ?', [$y]);
            return view('admin.attendance.results', ['result' => $result]);
        
        // if($request->session()->has('currentUser')){
        //     $year = $request->input('year');

        //     $y=$year."-%%-%%";
        //     $result = DB::select('SELECT * FROM `attendance` WHERE `date` LIKE ?', [$y]);
        //     return view('admin.attendance.results', ['result' => $result]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function searchByUsername(Request $request){
        
        $username = $request->input('username');
            $result = DB::table('attendances')->where('username', $username)->get();
            return view('admin.attendance.results', ['result' => $result]);
        
        // if($request->session()->has('currentUser')){
        //     $username = $request->input('username');
        //     $result = DB::table('attendance')->where('username', $username)->get();
        //     return view('admin.attendance.results', ['result' => $result]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function show(Request $request, $id){
        
        $data = DB::table('attendances')->where('id', $id)->first();
            return view('admin.attendance.detailsAttendance', ['data' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('attendance')->where('id', $id)->first();
        //     return view('admin.attendance.detailsAttendance', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function edit(Request $request, $id){
        // return $id;
        $data = DB::table('attendances')->where('id', $id)->first();
            return view('admin.attendance.editAttendance', ['data' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('attendance')->where('id', $id)->first();
        //     return view('admin.attendance.editAttendance', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }


    public function addAttendance(Request $request){
        // return $request;
        
        $musers = DB::table('users')->where('name', '<>', 'admin')->pluck('name');
        $users=$this->ucwordArray($musers);
            // return $users;
         return view('admin.attendance.addAttendance',compact('users'));

        // return $request;
        
        // if($request->session()->has('currentUser')){
        //     return view('admin.attendance.addAttendance');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function deleteAttendance(Request $request, $id){
        
        $data = DB::table('attendances')->where('id', $id)->first();
            return view('admin.attendance.deleteAttendance', ['data' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('attendance')->where('id', $id)->first();
        //     return view('admin.attendance.deleteAttendance', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function create(Request $request){
        
        $date = $request->input('date');
        $username = $request->input('username');
        $attendance = $request->input('attendance');
        $in = $request->input('in');
        $out = $request->input('out');

        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date('Y-m-d H:i:s', time());
        // $currentTime = time('H:i:s');

        $data = array('date' => $date, 
                    'username' => $username, 
                    'attendance' => $attendance,
                    'in' => $in, 
                    'out' => $out, 
                    'created_at' => $currentDate, 
                    'updated_at' => $currentDate);
        
        if(DB::table('attendances')->insert($data)){
            return redirect('/admin/attendance');
        }
        else{
            var_dump(DB::table('attendances')->insert($data));
        }
        return redirect('/admin/attendance');
    }

    public function delete(Request $request){

        $id = $request->input('id');

        DB::table('attendances')->where('id', '=', $id)->delete();

        return redirect('/admin/attendance');

    }

    public function update(Request $request){
        $id = $request->input('id');
        // $date = $request->input('date');
        // $username = $request->input('username');
        // $attendance = (int)$request->input('attendance');
        // $in = $request->input('in');
        // $out = $request->input('out');

        // date_default_timezone_set('Asia/Kolkata');
        // $currentDate = date('Y-m-d H:i:s', time());

        // $data = array('date' => $date, 
        //             'username' => $username, 
        //             'attendance' => $attendance, 
        //             'in' => $in, 
        //             'out' => $out, 
        //             'created_at' => $currentDate, 
        //             'updated_at' => $currentDate);
        
        // if(DB::table('attendances')->insert($data)){
        //     return redirect('/admin/attendance');
        // }
        // else{
        //     var_dump(DB::table('attendances')->insert($data));
        // }

        attendance::find($id)->update($request->all());
        return redirect('/admin/attendance');
    }

    public function searchAttendance(Request $request){
        // return $request;
        
         return view('admin.attendance.search');
    }

    public function store(Request $request){

        // return $request;
        
        // $addattendance = DB::table('attendances')->where('date','=', $request->date)->where('username','=', $request->name)->count();
        //     // return $addattendance;
        // if($addattendance==0){

            // $users = $request;
            // return $users;
            for($i=0;$i<count($request->name);$i++)
            {
                if ($request->is_checked[$i]==1){
                    $record = [
                        'date' => $request->date,
                        'username' => $request->name[$i],
                        'in' => $request->in[$i],
                        'out' => $request->out[$i],
                        'attendance' => $request->attendance,
                    ];
                    attendance::create($record);
                }
                

                // echo($request->name[0]);

                // attendance::create($request->all());
                // return $record;
            }
            // return redirect('/admin/attendance');
            return redirect()->route('attendances');
        // }
           
        // else{
        // // if(DB::table('attendances')->insert($record)){
        // //     return redirect('/admin/attendance');
        // // }
        // // else{
        // //     var_dump(DB::table('attendances')->insert($record));
        // // }
        // return redirect('/admin/attendance')->with('message','Attendance alredy taken.');
        // }
        
    }
}
