<?php

namespace App\Http\Controllers\Auth;
// require 'vendor/autoload.php';
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\ProfileRelated\Profile;
use Illuminate\Support\Facades\Log;
use App\Models\TweetRelated\Tweet;
use App\User;
use App\Http\Controllers\Controller;
// use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\PublicKeyLoader;
use Illuminate\Support\Str;






// include('Crypt/RSA.php');
use phpseclib3\Crypt\RSA;
// use phpseclib3\Crypt\Hash;
use phpseclib3\Crypt\Random;



class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','forgotpassword']]);
    }
    // public function loadUser(Request $request)    
    // {
    //     try {
    //         $user = auth()->user();
    //         return response()->json(['user' => $user]);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }        
    // }

    public function loadUser(Request $request)
    {
        try {
            $user = $request->user();
            $followerCount = $user->followers()->count();
            $followingCount = $user->following()->count();

            $userData = $user->toArray();
            $userData['follower_count'] = $followerCount;
            $userData['following_count'] = $followingCount;
            // $userData['avatar']  =asset($user->profile()->avatar);
            $profile = $user->profile;
            // Check if the profile exists
            $profile = $user->profile;
            if ($profile) {
                $userData['avatar'] = asset($profile->avatar);
            } else {
                // Provide a default value for the avatar
                // $userData['avatar'] = asset('path/to/default/avatar.png');
                $userData['avatar'] = asset('images/avatar/dummy.webp');
            }

            // $userData['avatar'] = asset($profile->avatar);
            return response()->json(['user' => $userData]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

   

    public function login(Request $request)
    {

        // $encryptedData = $request->input('encrypted_data');
        // $credentials= decryptData($encryptedData);
        // return $credentials;
        // Log::info('Login: ',$request->all() );
        
        // Validation
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ]);
        }

        // Check if the user's email is verified and status is 1
        $user = Auth::user();
        if ($user->email_verified_at === null || $user->status !== 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your email is not verified. Please verify your email.',
            ]);
        }

        // Proceed with login
        return response()->json([
            'status' => 'success',
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
            'user' => $user,
        ]);

    }



    public function register(Request $request){
        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // return $request;

        if($request->isMethod('post')){
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
            // return $data;

            $rules=[
                'surname'=>'required|regex:/^[\pL\s\-]+$/u',
                'name'=>'required|regex:/^[\pL\s\-]+$/u',
                'mobile'=>'required|numeric|digits:10',
                'email'=> 'required|email|max:255',
                'password'=>'required',
                'password'=>'required|digits:8',
                'password.required'=>'Password Must be Minimum 8 Digit',
                
            ];
            $customMessages=[
                'surname.required'=>'Surname is Required',
                'surname.alpha'=>'Valid Name is Required',
                'name.required'=>'Name is Required',
                'name.alpha'=>'Valid Name is Required',
                'mobile.required'=>'Mobile No. is Required',
                'mobile.numeric'=>'valid Mobile no. is Required',
                'mobile.digits'=>'Number Must be 11 Digit',
                'email.required'=> 'Email is Required',
                'email.email'=>'Valid Email is Required',
                'password.required'=>'Password is Required',
                
            ];
            


            $userCount=User::where('email',$data['email'])->count();
            if($userCount>0){
                $message="Email ({$data['email']}) Already Exists!";
                Session::flash('error_message',$message);
                // return redirect()->back(); 
                if(strpos($url, 'api') !== false){
                     return response()->json(['info'=>['status'=>'Error','message'=>$message]]);
                }
                else{
                    return redirect()->back();
                }
            }
            else{
                $user = new User;
                $user->surname=$data['surname'];
                $user->name=$data['name'];
                $user->email=$data['email'];
                $user->mobile=$data['mobile'];
                $user->role_id=$data['role_id'];
                $user->password=bcrypt($data['password']);
                $user->status=0;
                $user->save();

                // Send Confirmation Email
                $email = $data['email'];
                $messageData = [
                    'email'=> $data['email'],
                    'name'=>$data['name'],
                    'code'=>base64_encode($data['email'])
                ];

                
                if(strpos($url, ':8000') !== false){
                    $mail_sent=true;
                    $message = "Test! Mail not sent to ({$email}) You need to manually edit database to put status 1";
                }
                else{
                    $mail_sent = Mail::send('emails.confirmation',$messageData,function($message) use($email){
                        $message->to($email)->subject('తొగటవీరక్షత్రియ సంఘం యొక్క CENSUS అనువర్తనం లో చేరిక నిర్ధారణ');
                    });
            
                    // Check if the mail was sent successfully
                    if ($mail_sent) {
                        $message = "మీ ఈ -మెయిల్ చేసికొని నిర్ధారించండి. ({$email}) \nఅప్పుడే మీ అకౌంట్ వాడుకలోనికి వస్తుంది!";
                    } else {
                        $message = "Error sending confirmation email ({$email}), please try again!";
                    }
                }


                if(strpos($url, 'api') !== false){
                    if ($mail_sent) {
                        return response()->json(['info'=>['status'=>'Success','message'=>$message,'email'=> $data['email']]]);
                    } else {
                        return response()->json(['info'=>['status'=>'Error','message'=>$message]]);
                    }
                }
                else{
                    
                    if ($mail_sent) {
                        Session::put('success_message',$message);
                    } else {
                        Session::flash('error_message',$message);
                    }
                    return redirect()->back();
                }




            }
        }
    }

    public function confirm($encodedEmail) {
        $email = base64_decode($encodedEmail);
        $user = User::where('email', $email)->first();
        Log::info('confirm: ',$user );
        if ($user) {
            if ($user->status == 1) {
                $message = "Your Account is Already Activated. Please Login.";
                return response()->json([
                    'status' => 'warning',
                    'message' => $message,
                ]);
            } else {
                $user->update([
                    'status' => 1,
                    'email_verified_at' => Carbon::now()
                ]);
    
                // Send welcome email
                $messageData = ['name' => $user->name, 'mobile' => $user->mobile, 'email' => $email];
                Mail::send('emails.register', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Welcome to ThogataVeera Kshatriya Census App');
                });
    
                $message = "Your Account is Activated. You Can Login Now!";
                return response()->json([
                    'status' => 'Success',
                    'message' => $message,
                ]);
            }
        } else {
            return abort(404, 'User not found');
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function update(Request $request)
    {
        // {"place_id": 5442, "place_table_name": "District"}
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated successfully.',
            'user'=>$user,
        ]);
    }

    public function forgotpassword(Request $request){
        // Log::info('forgotPassword: ',$request->all() );
        if($request->isMethod('post')){
            $data = $request->all();
            Session::forget('error_message');
            Session::forget('success_message');

            $emailCount = User::where('email',$data['email'])->count();
            if($emailCount==0){
                $message= "Email Does Not Exists!";
                Session::put('error_message','Email Does Not Exists!');
                Session::forget('success_message');

                return response()->json([
                    'status' => 'error',
                    'message' => $message,
                ]);
            }

            //Generate New Random Password
            $random_password = Str::random(8);
            //Encode/secure password
            $new_password = bcrypt($random_password);
            User::where('email',$data['email'])->update(['password'=>$new_password]);
            $userName = User::select('name')->where('email',$data['email'])->first();
            $email = $data['email'];
            $name = $userName->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgot_password',$messageData,function($message) use($email){
            $message->to($email)->subject("Get New Password - Thogata");
            });

            $message = "Please Check Email For New Password!";
            Session::put('success_message',$message);

            return response()->json([
                'status' => 'Success',
                'message' => $message,
            ]);
            // return redirect('/login-register');
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Unauthorized',
        ]);

    }

   

    public function chkUserPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $user_id = Auth::User()->id;
            $checkPassword = User::select('password')->where('id',$user_id)->first();
            if(Hash::check($data['current_pwd'],$checkPassword->password)){
                return "true";
            }else{
                return "false";
            }
        }
    }
    public function updateUserPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            Session::forget('error_message');
            Session::forget('success_message');
            

            $user_id = Auth::User()->id;
            $checkPassword = User::select('password')->where('id',$user_id)->first();
            if(Hash::check($data['current_pwd'],$checkPassword->password)){
                //Update Password
                $new_pwd = bcrypt($data['new_pwd']);
                User::where('id',$user_id)->update(['password'=>$new_pwd]);
                $message = "Password Updated Successfully";
                Session::put('success_message',$message);
                return redirect()->back();

            }else{
                $message = "Current Password is Incorrect!";
                Session::put('error_message',$message);
                return redirect()->back();
            }
        }
    }

    public function me()
    {
        return response()->json(auth()->user());
    }


     // public function account(Request $request){
    //     $user_id = Auth::user()->id;
    //     $userDetails = User::find($user_id)->toArray();
    //     // $userDetails = json_decode(json_encode($userDetails),true);
    //     // dd($userDetails); die;

    //     if($request->isMethod('post')){
    //         $data = $request->all();


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

}
