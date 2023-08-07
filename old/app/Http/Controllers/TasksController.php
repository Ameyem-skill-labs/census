<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TasksController extends Controller
{
    public function index(){
        $tasks = DB::table('tasks')->get();
        return view('admin.tasks.index', ['tasks' => $tasks]);
    }

    public function addTask(Request $request){

        return view('admin.tasks.addTask');

        // if($request->session()->has('currentUser')){
        //     return view('admin.tasks.addTask');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function adminTasks(Request $request){

        $data = DB::table('tasks')->where('to', session('currentUser'))->get();
            return view('admin.tasks.myTasks', ['tasks' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('tasks')->where('to', session('currentUser'))->get();
        //     return view('admin.tasks.myTasks', ['tasks' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function create(Request $request){

        $name = $request->input('name');
        $from = $request->input('from');
        $to = $request->input('to');
        $body = $request->input('body');
        $duration = $request->input('duration');
        $status = $request->input('status');

        date_default_timezone_set('Asia/Dhaka');
        $date = date('Y-m-d H:i:s', time());

        $data = array('name' => $name, 'from' => $from, 'to' => $to, 'body' => $body, 'duration' => $duration, 'status' => $status, 'created_at' => $date, 'updated_at' => $date);
            DB::table('tasks')->insert($data);

            return redirect('/admin/tasks');

        // if($request->session()->has('currentUser')){
        //     $name = $request->input('name');
        //     $from = $request->input('from');
        //     $to = $request->input('to');
        //     $body = $request->input('body');
        //     $duration = $request->input('duration');
        //     $status = $request->input('status');


        //     date_default_timezone_set('Asia/Dhaka');
        //     $date = date('Y-m-d H:i:s', time());

        //     $data = array('name' => $name, 'from' => $from, 'to' => $to, 'body' => $body, 'duration' => $duration, 'status' => $status, 'created_at' => $date, 'updated_at' => $date);
        //     DB::table('tasks')->insert($data);

        //     return redirect('/admin/tasks');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function update(Request $request){

        $name = $request->input('name');
        $id = $request->input('id');
        $from = $request->input('from');
        $to = $request->input('to');
        $body = $request->input('body');
        $duration = $request->input('duration');
        $status = $request->input('status');

        date_default_timezone_set('Asia/Dhaka');
        $date = date('Y-m-d H:i:s', time());

        $data = array('name' => $name, 'from' => $from, 'to' => $to, 'body' => $body, 'duration' => $duration, 'status' => $status, 'updated_at' => $date);
        DB::table('tasks')->where('id', $id)->update($data);

        return redirect('/admin/tasks');

        // if($request->session()->has('currentUser')){
        //     $name = $request->input('name');
        //     $id = $request->input('id');
        //     $from = $request->input('from');
        //     $to = $request->input('to');
        //     $body = $request->input('body');
        //     $duration = $request->input('duration');
        //     $status = $request->input('status');

        //     date_default_timezone_set('Asia/Dhaka');
        //     $date = date('Y-m-d H:i:s', time());

        //     $data = array('name' => $name, 'from' => $from, 'to' => $to, 'body' => $body, 'duration' => $duration, 'status' => $status, 'updated_at' => $date);
        //     DB::table('tasks')->where('id', $id)->update($data);

        //     return redirect('/admin/tasks');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function delete(Request $request){

        $id = $request->input('id');
        DB::table('tasks')->where('id', '=', $id)->delete();
        return redirect('/admin/tasks');

        // if($request->session()->has('currentUser')){
        //     $id = $request->input('id');
        //     DB::table('tasks')->where('id', '=', $id)->delete();
        //     return redirect('/admin/tasks');
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function deleteTask(Request $request, $id){

        $data = DB::table('tasks')->where('id', $id)->first();
            return view('admin.tasks.deleteTask', ['data' => $data]);

        // if($request->session()->has('currentUser')){
        //     $data = DB::table('tasks')->where('id', $id)->first();
        //     return view('admin.tasks.deleteTask', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function editTask(Request $request, $id){

        $data = DB::table('tasks')->where('id', $id)->first();
        return view('admin.tasks.editTask', ['data' => $data]);
    
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('tasks')->where('id', $id)->first();
        //     return view('admin.tasks.editTask', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }

    public function getTask(Request $request, $id){

        $data = DB::table('tasks')->where('id', $id)->first();
            return view('admin.tasks.detailsTask', ['data' => $data]);
        
        // if($request->session()->has('currentUser')){
        //     $data = DB::table('tasks')->where('id', $id)->first();
        //     return view('admin.tasks.detailsTask', ['data' => $data]);
        // }
        // else{
        //     return view('errors/unauthorized');
        // }
    }
}
