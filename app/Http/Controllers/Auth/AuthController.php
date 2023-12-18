<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\UserLogin;
use App\Models\Cart;
// use Hash;
// use Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /** Customer Login page start */
    public function login(){
        return view('frontend.auth.login');
    }

    public function customerEmailLogin(){
        return view('frontend.auth.customer-email-login');
    }

    public function getMobileOtp(Request $request){
        $request->validate([
            'mobile' => 'required|unique:users,mobile',
        ]);
        $mobileotp = $request->mobile;
        $mobileotpsend = '123456';
        // $mobileotpsend = rand(111111,999999);
        session()->put('mobilenumber',$mobileotp);
        session()->put('mobileotp',$mobileotpsend);
        $msg = 'Dear Student, '.$mobileotpsend.' is your one time password (OTP). Please enter the OTP to proceed. Thank You, Regards - HASANAH EDUCATIONAL TRUST';
        $phones = $mobileotp;
        $url = "http://45.249.108.134/api.php";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=hasanahtrust&password=752761&sender=HETRST&sendto=".$phones."&message=".$msg."&PEID=1301164733895014972&templateid=1307164922578115135&type=3");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        if ($response) {

            $user = new User;
            $user->mobile = $request->mobile;
            $user->mobile_otp = $mobileotpsend;
            $user->user_type_id = 3;
            $user->save();

            session()->put('savedCurrentId',$user->id);

            return 'success';
        } else{
            session()->forget(['mobileotp', 'mobilenumber']);
            return 'failed';
        }
    }

    public function getEngineerMobileOtp(Request $request){
        $request->validate([
            'engineer_mobile' => 'required|unique:users,mobile',
        ]);
        $mobileotp = $request->engineer_mobile;
        $mobileotpsend = '123456';
        // $mobileotpsend = rand(111111,999999);
        session()->put('engineer_mobilenumber',$mobileotp);
        session()->put('engineer_mobileotp',$mobileotpsend);
        $msg = 'Dear Student, '.$mobileotpsend.' is your one time password (OTP). Please enter the OTP to proceed. Thank You, Regards - HASANAH EDUCATIONAL TRUST';
        $phones = $mobileotp;
        $url = "http://45.249.108.134/api.php";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=hasanahtrust&password=752761&sender=HETRST&sendto=".$phones."&message=".$msg."&PEID=1301164733895014972&templateid=1307164922578115135&type=3");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        if ($response) {

            $user = new User;
            $user->mobile = $request->engineer_mobile;
            $user->mobile_otp = $mobileotpsend;
            $user->user_type_id = 4;
            $user->save();

            session()->put('savedCurrentId',$user->id);

            return 'success';
        } else{
            session()->forget(['engineer_mobileotp', 'engineer_mobilenumber']);
            return 'failed';
        }
    }

    public function checkEngineerMobileOtp(Request $request){
        // dd($request->all());
        if($request->all()!=null){
            $checkOtp = User::where('mobile', $request->engineer_mobile_number)->first();
            // dd(Session::get('savedCurrentId'));
            // dd($checkOtp);
            if($checkOtp){
                if($request->engineer_mobile_otp==$checkOtp->mobile_otp){
                    return array(
                        'status' => 'success',
                        'message' => 'Otp Verified',
                    );
                }else{
                    return array(
                        'status' => 'failed',
                        'message' => 'Incorrect Otp',
                    );
                }
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }

        }

    }

    public function checkMobileOtp(Request $request){
        // dd($request->all());
        if($request->all()!=null){
            $checkOtp = User::where('mobile', $request->mobile_number)->first();
            // dd(Session::get('savedCurrentId'));
            // dd($checkOtp);
            if($checkOtp){
                if($request->mobile_otp==$checkOtp->mobile_otp){
                    return array(
                        'status' => 'success',
                        'message' => 'Otp Verified',
                    );
                }else{
                    return array(
                        'status' => 'failed',
                        'message' => 'Incorrect Otp',
                    );
                }
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }

        }
        /*
        if(Session::get('mobileotp')!=null){
            if($request->mobile_otp == Session::get('mobileotp')){
                return array(
                    'status' => 'success',
                    'message' => 'Otp Verified',
                );
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }
        }
        */
    }

    public function getEmailOtp(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email',
        ]);

        $email_id = $request->email;
        $emailotpsend = '123456';
        // $emailotpsend = rand(111111,999999);
        Session()->forget('email_otp');
        Session()->put('emailid',$email_id);
        Session()->put('email_otp',$emailotpsend);

        $html_body='<h4> Your Otp is : '.$emailotpsend.'</h4></br> ';

        require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.omhero.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@omhero.com';   //  sender username
            $mail->Password = 'J0BM7UZS#6X&';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('info@omhero.com', 'Om Hero');
            $mail->addAddress($request->email);
            $mail->addCC('ranasharma880@gmail.com');
            // $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('info@omhero.com', 'Om Hero');
            $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Mail Received from Enginner Mine';
        $mail->Body    = $html_body;
        $mail->send();

        if( !$mail->send() )
        {
            return 'failed';
        }else{
            return 'success';
        }


    }


    public function getEngineerEmailOtp(Request $request){
        $request->validate([
            'engineer_email' => 'required|unique:users,email',
        ]);

        $engineer_email = $request->engineer_email;
        $emailotpsend = '123456';
        // $emailotpsend = rand(111111,999999);
        Session()->forget('email_otp');
        Session()->put('engineer_email',$engineer_email);
        Session()->put('engineer_email_otp',$emailotpsend);

        $html_body='<h4> Your Otp is : '.$emailotpsend.'</h4></br> ';

        require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.omhero.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@omhero.com';   //  sender username
            $mail->Password = 'J0BM7UZS#6X&';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('info@omhero.com', 'Om Hero');
            $mail->addAddress($request->engineer_email);
            $mail->addCC('ranasharma880@gmail.com');
            // $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('info@omhero.com', 'Om Hero');
            $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Mail Received from Enginner Mine';
        $mail->Body    = $html_body;
        $mail->send();

        if( !$mail->send() )
        {
            return 'failed';
        }else{
            return 'success';
        }


    }



    public function checkEmailOtp(Request $request){
        if(Session::get('email_otp')!=null){
            if(Session::get('email_otp')==$request->email_otp){
                return array(
                    'status' => 'success',
                    'message' => 'Otp Verified',
                );
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }
        }
    }

    public function checkEngineerEmailOtp(Request $request){
        if(Session::has('engineer_email_otp')!=null){
            if(Session::has('engineer_email_otp')==$request->engineer_email_otp){
                return array(
                    'status' => 'success',
                    'message' => 'Otp Verified',
                );
            }else{
                return array(
                    'status' => 'failed',
                    'message' => 'Incorrect Otp',
                );
            }
        }
    }

    public function resendEmailOtp(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email',
        ]);

        $email_id = $request->email;
        $emailotpsend = '1234567';
        // $emailotpsend = rand(111111,999999);
        Session()->forget(['email_otp', 'email_otp_exp_time']);
        $otp_expires_time = now()->addMinutes(1); //Adjust the time as needed.
        Session()->put('email_otp_exp_time', $otp_expires_time);
        Session()->put('emailid',$email_id);
        Session()->put('email_otp',$emailotpsend);

        $html_body='<h4> Your Otp is : '.$emailotpsend.'</h4></br> ';

        require base_path("vendor/autoload.php");
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'mail.omhero.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'info@omhero.com';   //  sender username
            $mail->Password = 'J0BM7UZS#6X&';       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = 587;                          // port - 587/465

            $mail->setFrom('info@omhero.com', 'Om Hero');
            $mail->addAddress($request->email);
            $mail->addCC('ranasharma880@gmail.com');
            // $mail->addBCC($request->emailBcc);

            $mail->addReplyTo('info@omhero.com', 'Om Hero');
            $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Mail Received from Enginner Mine';
        $mail->Body    = $html_body;
        $mail->send();

        if( !$mail->send() )
        {
            return 'failed';
        }else{
            return 'success'. $otp_expires_time;
        }
    }

    public function postLogin(Request $request){
        $data = $request->validate([
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('user_logins.username',  $data['mobile'])
            ->where('user_logins.password', $data['password'])
            ->where('user_logins.status', 1)
            ->where('user_logins.user_type_id', 3)
            ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
            ->first();

        if (!$is_loggedin) {
            // return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
            return response()->json([
                "status" => false,
                //"redirect" => url("dashboard")
            ]);
        } else  {
            $request->session()->put('LoggedCustomer', $is_loggedin);

            if (Session('temp_user_id') != null) {
                // $uri = explode('/',session('url.intended'));
                Cart::where('temp_user_id', session('temp_user_id'))
                        ->update([
                            'user_id' => Session('LoggedCustomer')->id,
                            'temp_user_id' => null
                        ]);

                Session::forget('temp_user_id');
                // $output['redirectTo'] = session('url.intended');
            }


            return response()->json([
                "status" => true,
                //"redirect" => url("dashboard")
            ]);
        }
    }

    public function postEngineerLogin(Request $request){
        $data = $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('user_logins.username',  $data['phone'])
            ->where('user_logins.password', $data['password'])
            ->where('user_logins.status', 1)
            ->where('user_logins.user_type_id', 4)
            ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
            ->first();

        if (!$is_loggedin) {
            // return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
            return response()->json([
                "status" => false,
                //"redirect" => url("dashboard")
            ]);
        } else  {
            $request->session()->put('LoggedEngineer', $is_loggedin);
            return response()->json([
                "status" => true,
                //"redirect" => url("dashboard")
            ]);
        }
    }



    public function postEmailLogin(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $is_loggedin = UserLogin::join('users', 'users.id', '=', 'user_logins.user_id')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('user_logins.email',  $data['email'])
            ->where('user_logins.password', $data['password'])
            ->where('user_logins.status', 1)
            ->where('user_logins.user_type_id', 3)
            ->select(['users.*', 'user_types.name as userType', 'user_logins.*'])
            ->first();

        if (!$is_loggedin) {
            // return redirect()->back()->with(session()->flash('alert-danger', 'Failed! We do not recognize your username or password.'));
            return response()->json([
                "status" => false,
                //"redirect" => url("dashboard")
            ]);
        } else  {
            $request->session()->put('LoggedCustomer', $is_loggedin);
            return response()->json([
                "status" => true,
                //"redirect" => url("dashboard")
            ]);
        }
    }


    /** Customer Login page start */


    /** Customer Registration page start */
    public function registration(){
        return view('frontend.auth.register');
    }

    public function getIpAddress(Request $request){
        return $request->ip();
    }

    public function saveCustomerRegistration(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gst_number' => 'nullable',
            // 'email' => 'required|email|unique:users',
            // 'mobile' => 'required|unique:users|min:10|max:13',
            'email' => 'required|email',
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $user_details = User::where('mobile', $request->mobile)
                    ->first();
        // dd($user_details);
        $user_details->first_name = $request->first_name;
        $user_details->last_name = $request->last_name;
        $user_details->email = $request->email;
        $user_details->password = Hash::make($request->password);
        $user_details->email_otp = $request->email_otp;
        $user_details->company_name = $request->company_name;
        $user_details->gst_number = $request->gst_number;
        $user_details->email_verified_at = now();
        $user_details->mobile_verified_at = now();
        $user_details->is_verified = 1;
        $user_details->user_type_id = 3;
        $user_details->save();

        $user_login = UserLogin::create([
            'username' => $request->mobile,
            'email' => $request->email,
            'password' => $request->password,
            'user_id' => $user_details->id,
            'user_type_id' => 3,
            'status' => 1,
        ]);

        return response()->json([
            "status" => true,
            "redirect" => url("dashboard")
        ]);

    }


    public function saveEngineerRegistration(Request $request)
    {
        $request->validate([
            'engineer_first_name' => 'required',
            'engineer_last_name' => 'required',
            // 'gst_number' => 'nullable',
            // 'email' => 'required|email|unique:users',
            // 'mobile' => 'required|unique:users|min:10|max:13',
            'engineer_email' => 'required|email',
            'engineer_mobile' => 'required',
            'engineer_password' => 'required',
        ]);

        $user_details = User::where('mobile', $request->engineer_mobile)
                    ->first();
        // dd($user_details);
        $user_details->first_name = $request->engineer_first_name;
        $user_details->last_name = $request->engineer_last_name;
        $user_details->email = $request->engineer_email;
        $user_details->password = Hash::make($request->engineer_password);
        $user_details->email_otp = $request->email_otp;
        // $user_details->company_name = $request->company_name;
        // $user_details->gst_number = $request->gst_number;
        $user_details->email_verified_at = now();
        $user_details->mobile_verified_at = now();
        $user_details->is_verified = 1;
        $user_details->user_type_id = 4;
        $user_details->save();

        $user_login = UserLogin::create([
            'username' => $request->engineer_mobile,
            'email' => $request->engineer_email,
            'password' => $request->engineer_password,
            'user_id' => $user_details->id,
            'user_type_id' => 4,
            'status' => 1,
        ]);

        return response()->json([
            "status" => true,
            "redirect" => url("dashboard")
        ]);

    }

    // public function postRegistration(Request $request){
    //     // dd($request->all());
    //     $request->validate([
    //         'first_name' => 'required',
    //         'company_name' => 'required',
    //         'last_name' => 'required',
    //         'gst_number' => 'nullable',
    //         'email' => 'required|email|unique:users',
    //         'mobile' => 'required|unique:users|min:10|max:13',
    //         'password' => 'required'
    //     ]);

    //     // mobilenumber
    //     $user_details = User::where('mobile', $request->mobile)
    //                 ->where('email', $request->email)
    //                 ->first();

    //                 dd($user_details);

    //     $user->mobile = $request->mobile;
    //     $user->mobile_otp = $mobileotpsend;
    //     $user->user_type_id = 3;
    //     $user->save();

    //     $data = $request->all();
    //     $data['ip_address'] = $request->ip();

    //     $check = $this->create($data);
    //     if($check){
    //         $user_login = UserLogin::create([
    //             'username' => $data['email'],
    //             'password' => $data['password'],
    //             'user_id' => $check->id,
    //             'user_type_id' => 3,
    //             'status' => 1,
    //         ]);
    //     }

    //     return redirect("login")->with(session()->flash('alert-success', 'Successfully Registered.'));
    // }

    public function create(array $data){
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'status' => 1,
            'user_type_id' => 3,
            'user_designation_id' => 2,
            'ip_address' => $data['ip_address'],
        ]);
    }
    /** Customer Registration page End */

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/')->with(session()->flash('alert-success', 'Successfully Loggedout'));
    }
}
