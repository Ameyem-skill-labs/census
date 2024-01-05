<?php

namespace App\Http\Controllers;


// use App\Models\User;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\ProfileRelated\Profile;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getUsers(Request $request)
{
    // {"filters": {"role_id": 4},"user":{"id":2}}
    // Log::info('$request->input data: ' . json_encode($request->input()));

    $filters = $request->input('filters', []);
    

    $validatedData = $request->validate([
        'user.id' => 'integer' 
    ]);
    $target_user = $request->input('user', []);
    // {"filters": {"role_id": 4},"user":{"id": user.id },"use_place_filter":{"decision":"yes"}};
    $use_place_filter = $request->input('use_place_filter', []);
    $place_filter_decision = isset($use_place_filter["decision"])? $use_place_filter["decision"]:"no" ;
    // $roleId = (int) $request->input('filters.role_id');
    // $userId = (int) $request->input('user.id');
    // $decision = (int) $request->input('use_place_filter.decision');

    // Log::info('$request->input data $filters: ' . json_encode($filters));
    // Log::info('$request->input data decision: ' . json_encode($place_filter_decision));
    // $user_id = $target_user['id'] ?? null;
    $user_id = $validatedData['user']['id']?? null;
    if ( $place_filter_decision=='yes'){    
       
        if ($user_id) {
            $user = User::find($user_id); // Fetches the user with the given ID
            
            // Now you can use $user for further logic
        }
        else{
            $user=Auth::user();
        }
        $modelClass = '\\App\\Models\\PlaceRelated\\' . Str::studly($user->place_table_name?? '');  
        if (!class_exists($modelClass)) {
            return response()->json(['error' => 'Model not found'], 404);
        }
        // Instantiate the model with the specified ID
        $placeInstance = new $modelClass;
        // $placeInstance->id = $super_place['place_id'] ?? null;
        $placeInstance->id = $user->place_id?? null;

        // Check if the getSubplaceIds method exists and call it
        if (method_exists($placeInstance, 'getSubplaceIds')) {
            $subplace_ids = $placeInstance->getSubplaceIds();
        } else {
            $subplace_ids = [];
        }       
        // Log::info('User data: ' . json_encode($user->place_table_name)); 
        // Log::info('User data: ' . json_encode($subplace_ids));
    }
    $query = User::query();
    // return  $subplace_ids;
    
    // // Apply filters
    foreach ($filters as $key => $value) {
        $query->where($key, $value);
        Log::info('$key, $value: ' . json_encode( $value));
    }
    if (!empty($subplace_ids)) {
        $query->whereIn('place_id', $subplace_ids);
    }
    // return response()->json($query);
    $users = $query->get()->map->toCustomArray();
    if (count($users) === 0) {
        // Return a warning response if users array is empty
        return response()->json([
            'warning' => 'No users found',
            'status' => 'warning'
        ], 200); // 200 OK, as this is not an error condition
    }
    
    // Log::info('Users data: ' . json_encode($users));
    return response()->json($users) ;
    // $mstr='[{"approved_by_id": null, "avatar": null, "blood_group": null, "created_at": "2023-12-18T10:06:34.000000Z", "editing_village_id": null, "education": null, "email": "abdeo@dummy.com", "email_verified_at": null, "id": 11, "is_approved": null, "marriage_status": null, "mobile": "9000000018", "name": "User18", "occupation": null, "place": {"district": "Palnadu", "id": 
    //     50460, "mandal": "Karempudi", "state": "Andhrapradesh"}, "place_id": 50460, "place_table_name": "Mandal", "role_id": 4, "sex": null, "status": 0, "surname": "Surname18", "updated_at": "2023-12-18T10:39:14.000000Z", "username": "user18"}, {"approved_by_id": null, "avatar": null, "blood_group": null, "created_at": "2023-12-18T10:06:34.000000Z", "editing_village_id": null, "education": null, "email": "user19@dummy.com", "email_verified_at": null, "id": 12, "is_approved": null, "marriage_status": null, "mobile": "9000000019", "name": "User19", "occupation": 
    //     null, "place": {"district": "Palnadu", "id": 50460, "mandal": "Karempudi", "state": "Andhrapradesh"}, "place_id": 50460, "place_table_name": "Mandal", "role_id": 4, "sex": null, "status": 0, "surname": "Surname19", "updated_at": "2023-12-18T10:06:34.000000Z", "username": "user19"}]';
    // return '[]';
     
}

    public function updateOtherUser(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'user_id' => 'required|integer',
        'is_approved' => 'required|boolean',
        'approved_by' => 'required|integer'
    ]);

    // Find the user by ID
    $user = User::find($validatedData['user_id']);

    // Check if the user exists
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Update the user's approval status
    $user->is_approved = $validatedData['is_approved'];
    $user->approved_by_id = $validatedData['approved_by']; // Assuming you have an approved_by_id column
    $user->save();

    return response()->json(['message' => 'User updated successfully', 'user' => $user]);
}

    public function checkUser(Request $request){

        $user = $request->user();

        $users = User::
        select('username')
        ->where('username', '=', $request->username)
        ->get();

            if ($users->isEmpty()) {
                // The username is available
                return response()->json(['message' => 'This username is available.','available'=>true]);
            } else {
                // The username is already taken
                return response()->json(['message' => 'This username is already taken.','available'=>false]);
            }
    }
    public function confirm($email){
        // return $email;
        Session::forget('error_message');
        Session::forget('success_message');
        $email = base64_decode($email);
        // return $email;
        // Check User Email Exists

        $userCount = User::where('email',$email)->count();
        if($userCount>0){
             // User Email is already activated or not
             $userDetails=User::where('email',$email)->first();
             if($userDetails->status==1){
                 $message = "Your Account is Already Activated. Please Login in app.";
                 Session::put('success_message',$message);
                //  return redirect('/login');


                    return view('home.success');
             }else{
                 // Update User Status to 1 to Activate Account
                 User::where('email',$email)->update(['status'=>1]);
    
                         $messageData=['name'=>$userDetails['name'],'mobile'=>$userDetails['mobile'],'email'=>$email];
                         Mail::send('emails.register',$messageData,function($message) use($email){
                             $message->to($email)->subject('Welcome to Thogata Veera Kshatriya Sangham');
                        });

                        // $profile = Profile::firstOrCreate(['user_id' =>$userDetails->id]);

                    //redirect to login/register with success page
                    $message = " Your Account is Activated. You Can Login Now!";
                    Session::put('success_message',$message);
                    return view('home.success');
             }
        }else{
            abort(404);
        }

    }


    
    public function loginRegister(){
        return view('home.login_register');
    }

    // public function registerUser(Request $request){
    //     $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //     // return $url;
    //     // error_log('Some message here.');
    //     if($request->isMethod('post')){
    //         Session::forget('error_message');
    //         Session::forget('success_message');
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;
    //         $rules=[
    //             'surname'=>'required|regex:/^[\pL\s\-]+$/u',
    //             'name'=>'required|regex:/^[\pL\s\-]+$/u',
    //             'mobile'=>'required|numeric|digits:10',
    //             'email'=> 'required|email|max:255',
    //             'password'=>'required',
    //             'password'=>'required|digits:8',
    //             'password.required'=>'Password Must be Minimum 8 Digit',
                
    //         ];
    //         $customMessages=[
    //             'surname.required'=>'Surname is Required',
    //             'surname.alpha'=>'Valid Name is Required',
    //             'name.required'=>'Name is Required',
    //             'name.alpha'=>'Valid Name is Required',
    //             'mobile.required'=>'Mobile No. is Required',
    //             'mobile.numeric'=>'valid Mobile no. is Required',
    //             'mobile.digits'=>'Number Must be 11 Digit',
    //             'email.required'=> 'Email is Required',
    //             'email.email'=>'Valid Email is Required',
    //             'password.required'=>'Password is Required',
                
    //         ];
            
    //         // $this->validate($request,$rules,$customMessages);

    //         $userCount=User::where('email',$data['email'])->count();
    //         if($userCount>0){
    //             $message="Email Already Exists!";
    //             Session::flash('error_message',$message);
    //             // return redirect()->back(); 
    //             if(strpos($url, 'api') !== false){
    //                 // return $message;}
    //                 return response()->json(['info'=>['status'=>'Error','message'=>'Email already registered']]);
    //             }
    //             else{
    //                 return redirect()->back();
    //             }
    //         }
    //         else{
    //             $user = new User;
    //             $user->surname=$data['surname'];
    //             $user->name=$data['name'];
    //             $user->email=$data['email'];
    //             $user->mobile=$data['mobile'];
    //             $user->password=bcrypt($data['password']);
    //             // $user->address="";
    //             $user->status=0;
    //             $user->save();

    //             // Send Confirmation Email
    //             $email = $data['email'];
    //             $messageData = [
    //                 'email'=> $data['email'],
    //                 'name'=>$data['name'],
    //                 'code'=>base64_encode($data['email'])
    //             ];

                
    //             if(strpos($url, ':8000') !== false){
                   
    //             }
    //             else{
    //                 Mail::send('emails.confirmation',$messageData,function($message) use($email){
    //                     $message->to($email)->subject('Confirm Your Email Account for Registration');
    //                     });
    //             }

                

    //             // Redirect Back With Success Message

    //             $message="Please Check Your Email account For Confirmation to Activate Your Account!";
    //             Session::put('success_message',$message);

    //             if(strpos($url, 'api') !== false){
    //                 // return ['info'=>['message'=>$message,'email'=> $data['email']]];
    //                 return response()->json(['info'=>['status'=>'Success','message'=>$message,'email'=> $data['email']]]);
    //             }
    //             else{
    //                 return response()->json(['info'=>['status'=>'Error','message'=>'Email already registered']]);
    //             }


    //         }
    //     }
    // }

    // public function confirmAccount($email){
    //     Session::forget('error_message');
    //     Session::forget('success_message');
    //     $email = base64_decode($email);

    //     // Check User Email Exists

    //     $userCount = User::where('email',$email)->count();
    //     if($userCount>0){
    //          // User Email is already activated or not
    //          $userDetails=User::where('email',$email)->first();
    //          if($userDetails->status==1){
    //              $message = "Your Account is Already Activated. Please Login.";
    //              Session::put('error_message',$message);
    //              return redirect('/login-register');
    //          }else{
    //              // Update User Status to 1 to Activate Account
    //              User::where('email',$email)->update(['status'=>1]);
    
    //                      $messageData=['name'=>$userDetails['name'],'mobile'=>$userDetails['mobile'],'email'=>$email];
    //                      Mail::send('emails.register',$messageData,function($message) use($email){
    //                          $message->to($email)->subject('Welcome to Our E-Commerce');
    //                     });

    //                 //redirect to login/register with success page
    //                 $message = " Your Account is Activated. You Can Login Now!";
    //                 Session::put('success_message',$message);
    //                 return redirect('/login-register');
    //          }
    //     }else{
    //         abort(404);
    //     }

    // }

    // public function logoutUser(){
    //     Auth::logout();
    //     return redirect('/');
    // }

    // public function loginUser(Request $request){
    //     // return $request;
    //     // print($request);
        
    //     if($request->isMethod('post')){
    //         Session::forget('error_message');
    //         Session::forget('success_message');
    //         $data = $request->all();
    //         // $databaseName = \DB::connection()->getDatabaseName();




    //         if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    //             // Session::flash('error_message','Invalid Email or Password!');
    //             //Check Email is Activator or Not
    //             $userStatus = User::where('email',$data['email'])->first();
    //             // 
    //             if($userStatus->status==0){
    //                 Auth::logout();
    //                 $message = "Your Account is Not Activated Yet! Please Confirm Your Email to Activate!";
    //                 Session::put('error_message',$message);
    //                 return redirect()->back();
    //             }
                
    //             if(!empty(Session::get('session_id'))){
    //                 $user_id = Auth::user()->id;
    //                 $session_id = Session::get('session_id');
    //                 Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
    //             }
    //             // return $userStatus;
    //             // return redirect('/admin/home');
    //             return view('home');
    //         }else{
    //             // return $data ;
    //             $message="Invalid Email or Password!"; //$data['password'];//
    //             Session::flash('error_message',$message);
               
    //             return redirect()->back();
    //         }
    //     }
    // }

    // public function forgotPassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         Session::forget('error_message');
    //         Session::forget('success_message');
    //         // echo "<pre>"; print_r($data); die;
    //         $emailCount = User::where('email',$data['email'])->count();
    //         if($emailCount==0){
    //             $message= "Email Does Not Exists!";
    //             Session::put('error_message','Email Does Not Exists!');
    //             Session::forget('success_message');
    //             return redirect()->back();
    //         }

    //         //Generate New Random Password
    //         $random_password = Str::random(8);
    //         //Encode/secure password
    //         $new_password = bcrypt($random_password);
    //         User::where('email',$data['email'])->update(['password'=>$new_password]);
    //         $userName = User::select('name')->where('email',$data['email'])->first();
    //         $email = $data['email'];
    //         $name = $userName->name;
    //         $messageData = [
    //             'email'=>$email,
    //             'name'=>$name,
    //             'password'=>$random_password
    //         ];
    //         Mail::send('emails.forgot_password',$messageData,function($message) use($email){
    //         $message->to($email)->subject("Get New Password - E-Commerce");
    //         });

    //         $message = "Please Check Email For New Password!";
    //         Session::put('success_message',$message);
    //         return redirect('/login-register');
    //     }
    //     return view('home.forgot_password');
    // }

    // public function account(Request $request){
    //     $user_id = Auth::user()->id;
    //     $userDetails = User::find($user_id)->toArray();
    //     // $userDetails = json_decode(json_encode($userDetails),true);
    //     // dd($userDetails); die;

    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;

    //         Session::forget('error_message');
    //         Session::forget('success_message');

    //         // Validation
    //         $rules=[
    //             'name'=>'required|regex:/^[\pL\s\-]+$/u',
    //             'mobile'=>'required|numeric|digits:11',
    //             'location_status'=>'required',
    //             'district'=>'required',
    //             'pin_code'=>'required',
    //             'address'=>'required'
    //         ];
    //         $customMessages=[
    //             'name.required'=>'Name is Required',
    //             'name.alpha'=>'Valid Name is Required',
    //             'mobile.required'=>'Mobile No. is Required',
    //             'mobile.numeric'=>'valid Mobile no. is Required',
    //             'mobile.digits'=>'Number Must be 11 Digit',
    //             'address'=>'Valid Address is Required',
    //             'location_status'=>'Select Location Status is Required',
    //             'district'=>'Select District is Required',
    //             'pin_code'=>'Valid Pin Code is Required',
    //         ];
    //         $this->validate($request,$rules,$customMessages);

    //         $user = User::find($user_id);
    //         $user->name = $data['name'];
    //         $user->mobile = $data['mobile'];
    //         $user->location_status = $data['location_status'];
    //         $user->district = $data['district'];
    //         $user->pin_code = $data['pin_code'];
    //         $user->address = $data['address'];
    //         $user->save();
    //         $message = "Your Account Details Has Been Updated Successfully";
    //         Session::put('success_message',$message);
    //         return redirect()->back();
    //     }
        
    //     return view('home.user_account')->with(compact('userDetails'));
    //     // return $userDetails;
    // }

    // public function chkUserPassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;
    //         $user_id = Auth::User()->id;
    //         $checkPassword = User::select('password')->where('id',$user_id)->first();
    //         if(Hash::check($data['current_pwd'],$checkPassword->password)){
    //             return "true";
    //         }else{
    //             return "false";
    //         }
    //     }
    // }
    // public function updateUserPassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         Session::forget('error_message');
    //         Session::forget('success_message');
            
    //         // echo "<pre>"; print_r($data); die;
    //         $user_id = Auth::User()->id;
    //         $checkPassword = User::select('password')->where('id',$user_id)->first();
    //         if(Hash::check($data['current_pwd'],$checkPassword->password)){
    //             //Update Password
    //             $new_pwd = bcrypt($data['new_pwd']);
    //             User::where('id',$user_id)->update(['password'=>$new_pwd]);
    //             $message = "Password Updated Successfully";
    //             Session::put('success_message',$message);
    //             return redirect()->back();

    //         }else{
    //             $message = "Current Password is Incorrect!";
    //             Session::put('error_message',$message);
    //             return redirect()->back();
    //         }
    //     }
    // }


    

}
