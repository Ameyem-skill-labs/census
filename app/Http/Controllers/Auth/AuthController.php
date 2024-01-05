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





// include('Crypt/RSA.php');
use phpseclib3\Crypt\RSA;
// use phpseclib3\Crypt\Hash;
use phpseclib3\Crypt\Random;



class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
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
        Log::info('Login: ' );
        
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
            // echo "<pre>"; print_r($data); die;
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

    public function confirm($email){
        return $email;
        Session::forget('error_message');
        Session::forget('success_message');
        $email = base64_decode($email);

        // Check User Email Exists

        $userCount = User::where('email',$email)->count();
        if($userCount>0){
             // User Email is already activated or not
             // Your existing code to update the status
            User::where('email', $email)->update([
                'status' => 1,
                'email_verified_at' => Carbon::now() // This will set the current date and time
            ]);
             if($userDetails->status==1){
                 $message = "Your Account is Already Activated. Please Login.";
                 Session::put('error_message',$message);
                 return redirect('/login-register');
             }else{
                 // Update User Status to 1 to Activate Account
                 User::where('email',$email)->update(['status'=>1]);

    
                         $messageData=['name'=>$userDetails['name'],'mobile'=>$userDetails['mobile'],'email'=>$email];
                         Mail::send('emails.register',$messageData,function($message) use($email){
                             $message->to($email)->subject('Welcome to ThogataVeera Kshatriya Census App');
                        });

                        // $profile = Profile::firstOrCreate(['user_id' =>$userDetails->id]);

                    //redirect to login/register with success page
                    $message = " Your Account is Activated. You Can Login Now!";
                    Session::put('success_message',$message);
                    return redirect('/login-register');
             }
        }else{
            abort(404);
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

    public function me()
    {
        return response()->json(auth()->user());
    }

}
