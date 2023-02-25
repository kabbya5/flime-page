<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Carbon\Carbon;
use Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function emaliVerification(Request $request){
        $request->validate([
            'otp-code' => 'required',
        ],[
            'otp-code.required' => 'otp code field required!'
        ]);
        $input_otp_code = $request->input('otp-code');
        $user_id = Auth::id();
        $otp_code = Session::get('email_code');

        if($otp_code == $input_otp_code){
            $user = User::where('id',$user_id)->update(['email_verified_at' => Carbon::now()]);
            return back();
        }else{
            return back()->with('alert','Invalid otp code');
        }
        
    }
}
