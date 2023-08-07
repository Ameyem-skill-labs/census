<?php

namespace App\Http\Controllers\Auth;
// require 'vendor/autoload.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\ProfileRelated\Profile;

use App\Models\TweetRelated\Tweet;
use App\User;
use App\Http\Controllers\Controller;
// use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\PublicKeyLoader;





// include('Crypt/RSA.php');
use phpseclib3\Crypt\RSA;
// use phpseclib3\Crypt\Hash;
use phpseclib3\Crypt\Random;



// function decryptData($encryptedData) {
//     $privateKeyPem = '-----BEGIN RSA PRIVATE KEY-----
//     MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQChlXunSm5dJ3E3
//     hDOKHlhmAyN5E+bTx69p0+bmlfsaPioSl2s2GQINWNLhbQDfIkCwnzab3bBG2h/U
//     3r1chPjoNuxGfTW5/iKp5vCL2PLq3uSm6o4cYb7w4t34NGcw3X6OlkOoSb8bvSqq
//     daD9Z81Dmu/0wpHZpvF8DPHl2ZrYfKp/Ens5wfNcSyOcSaea5H+Gr5tskxRWiEGY
//     7KKB+e+1ObRbbjPQUyNxrCBI6lQO0l9oy1LYXXycID4gAlcmaVX/q7M3Eyw1NwxB
//     +ot+f+A1RnK1/Eapyo1OHM/ZEPPUXGEoZW2pxY1UB5D61IiOVdAL6mcPEJEe47Dl
//     l9+CiertAgMBAAECggEAHylz+nRZSm/T3tAJHIbzp2DNk4kqCAfHpZIvQqMEFTCN
//     7p3zGDDEe4x4xu69r0qszSM3ZeHgIBnq76OxQ0mFs0r8UC/Pj7oaN0gJdf72AiPQ
//     Vvx/Qav8JfqqsjZw/DSLNrZ1/9uRFqlptAwRay18oaAczMhFVoNiqPjaIejQexVp
//     PNIBUgZIQLXhp40UdFkC2Y8HDa5kGJeibz624eMuUNbQ61tJwnSeyCpqsIrlurCP
//     pzd7kZZWe9euq8FEFif3uSOJIc3F4t1MA7rFsw1hRhgx2Y/Ezhf0O7QcjXZ8LsmY
//     gOdMJhqRk5RYtJCzBiQIJF+5Dy1LfXi45vubom8tpQKBgQDXUpxhGJJsZ7HjjNeF
//     kB3YCCcGezXumBuWqV9akPVykw+wSLon/d8TWFGOzxw+hlcacS4jQBBC9iC5w2jS
//     u+9MyZYZC/CGOruxzdRXTV0Jsw36TjwE0oVUKktAr5KJ9pmCQCsyIE+4BKZSemzW
//     3uXEgBQAcznXtKfVOCgYIuMoPwKBgQDAG/gS9XayYb+05r03oADxiL6RkPExrJsS
//     It/bbKvuS+Li1Nx+GsuzUPgnPYkChbNjb1ZRnxvxo5rMyK4uKZ6t5o8Vtzgf62Nq
//     Jo6648Libdrk+cusZ22vhAWRetDgvGf2IRYtksNQb5D1Z2cIs/k+wyfwD0N1Z3mR
//     Gvv9c/iB0wKBgQDPVRORBvkO+zY2Fsr8J84k04zIV+GRkdOW2hYf/c7p+SM1KoJd
//     ub2QQg2eRl06815x7qNve+NsptTSKpAHwsDknoMyMOX0Sh+rULdzLOI2UbxW1fhC
//     6HdLmMIHUkf3IoWj/qfZR3WbipagepPMvqpd8LnRySHcS28EB2PMAePbPwKBgFOC
//     lQdgzxViKpzwBOcOVfqpL/ZFZKPsXYi3wko3ZlHziRCD6cmjylML6qPcOxfumPmr
//     p4FZwiL7tMo6noUQsJr189NDz1EI2TGGy1rwsYIOsS4CbIhoeaTnpigElJJtNGAp
//     J+PtvZvUs9YJ+h8tZTbkTRMs/20k6xKqAUq/RBLjAoGAQUzhTLj6yHMwOEc+Wkp4
//     y+97uz832Qs1A/i9/3ZkL9yuOnaAYi2qwNPTKFYJsap8HGg5n93DQS5Aq2CLpT56
//     fXDOWssB+BbUQWOJEgSNuvaCoBMK995Jq3CY0HlkiIkz9Gd5jTQZT5bhtRsgSdSp
//     bbPtWtkwDqkvkEMUt2gB1pc=
//     -----END RSA PRIVATE KEY-----';
//     $rsa = PublicKeyLoader::load($privateKeyPem);

//     // $rsa->loadKey($privateKeyPem);
//     $rsa->withHash ('sha256');
//     $rsa->withMGFHash('sha1');
//     $rsa->withPadding(RSA::ENCRYPTION_OAEP);

//     $decryptedData = $rsa->decrypt($encryptedData);

//     return $decryptedData;

//     $rsa = new RSA();
//     $rsa->loadKey($privateKeyPem);
//     $rsa->setHash('sha256');
//     $rsa->setMGFHash('sha1');
//     $rsa->setEncryptionMode(RSA::ENCRYPTION_OAEP);

//     $decodedData = base64_decode($encryptedData);
//     $decryptedData = $rsa->decrypt($decodedData);

//     return json_decode($decryptedData, true);

//     // $publicKey = PublicKeyLoader::load($privateKeyPem)
//     // ->withHash('sha256')
//     // ->withMGFHash('sha1');

// // $encryptedData = $publicKey->encrypt(json_encode($data));

// // return base64_encode($encryptedData);

//     // return base64_encode($encryptedData);

//     return $publicKey->decrypt(base64_encode($encryptedData));
// }

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
        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }


        return response()->json([
                'status' => 'success',
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }



        public function register(Request $request){
        $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // return $request;

        if($request->isMethod('post')){
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
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
                    // return $message;}
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
                        $message->to($email)->subject('తొగటవీరక్షత్రియ సంఘం యొక్క అనువర్తనం లో చేరిక నిర్ధారణ');
                    });
            
                    // Check if the mail was sent successfully
                    if ($mail_sent) {
                        $message = "Please Check Your Email account ({$email})For Confirmation to Activate Your Account!";
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
             $userDetails=User::where('email',$email)->first();
             if($userDetails->status==1){
                 $message = "Your Account is Already Activated. Please Login.";
                 Session::put('error_message',$message);
                 return redirect('/login-register');
             }else{
                 // Update User Status to 1 to Activate Account
                 User::where('email',$email)->update(['status'=>1]);
    
                         $messageData=['name'=>$userDetails['name'],'mobile'=>$userDetails['mobile'],'email'=>$email];
                         Mail::send('emails.register',$messageData,function($message) use($email){
                             $message->to($email)->subject('Welcome to Our E-Commerce');
                        });

                        $profile = Profile::firstOrCreate(['user_id' =>$userDetails->id]);

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

    public function me()
    {
        return response()->json(auth()->user());
    }

}
