<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthOTPController extends Controller
{
    
    /**
     * Return view of OTP login page
    */
    public function login(){
        return view('auth.otp-login');
    }

    /**
     * Generate OTP
     * 
     * @param   Request $request
    */
    public function generate(Request $request){
        
        // validate data
        $request->validate([
            'phone' => 'required|exists:users,phone'
        ]);

        // generate an otp
        $verification_code = $this->generateOtp($request->phone);

        $message = "Your OTP to login is : ".$verification_code->otp;

        return redirect()->route('otp.verification', ['user_id' => $verification_code->user_id])->with('success', $message);

    }

    public function generateOtp(string $phone){
        $user = User::where('phone', $phone)->first();

        // user doesn't have any exisiting OTP
        $verification_code = VerificationCode::where('id', $user->id)->latest()->first();
    
        $now = Carbon::now();

        if($verification_code && $now->isBefore($verification_code->expire_at)){
            return $verification_code;
        }

        return VerificationCode::create([
            'user_id'   => $user->id,
            'otp'       => rand(123456, 999999),
            'expire_at' => Carbon::now()->addMinutes(1)
        ]);
    
    }

    public function verification($user_id){

        return view('auth.otp-verification')->with(['user_id' => $user_id]);
    
    }

    public function loginWithOtp(Request $request){
        
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required' 
        ]);

        $verification_code = VerificationCode::where('user_id', $request->user_id)
            -> where('otp', $request->otp)->first();

        $now = Carbon::now();
        if(!$verification_code){
            
            return redirect()->back()->with('error', 'Invalid OTP');

        }elseif($verification_code && $now->isAfter($verification_code->expire_at)){
            
            return redirect()->route('otp.login')->with('error', 'Your OTP has been expired');

        }

        $user = User::whereId($request->user_id)->first();

        if($user){
            
            // expire the otp
            $verification_code->update([
                'expire_at' => Carbon::now()
            ]);

            Auth::login($user);

            return to_route('admin.dashboard');

        }

        return to_route('otp.login')->with('error', 'Invalid OTP');

    }

}
