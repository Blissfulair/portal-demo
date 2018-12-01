<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Setting;
use App\Payment;
use App\Calendar;

class PaymentController extends Controller
{
    const PAID = 1;
    public function recipt($reciept_id)
    {
        $profile = Auth::user();
        $payment = Payment::find($reciept_id);
        $setting = Setting::find(1);
        $classes = array(
            1   =>  'JSS 1',
            2   =>  'JSS 2',
            3   =>  'JSS 3',
            4   =>  'SS 1',
            5   =>  'SS 2',
            6   =>  'SS 3'
        );
        return view('frontend.reciept', ['profile'=>$profile, 'setting'=>$setting, 'payment' => $payment, 'classes'=>$classes]);
    }
    public function payment()
    {
        $payments = Payment::where('user_id', Auth::user()->id)->get();
        return view('frontend.payment', ['payments'=>$payments]);
    }
    public function payment_form(){
        return view('frontend.make_payment');
    }
    public function make_payment(Request $request)
    {
        $user = Auth::user();
        if($user->role == 0){
        $payment = new Payment();
        $payment->name = $request['name'];
        $payment->session = (date('Y')-1). '/'.date('Y');
        $payment->status = 1;
        $payment->term = Calendar::current_term()->id;
        $payment->user_id = $user->id;
        $payment->payment_id = 'ps00000'.substr(str_shuffle('123456789'), 2, 6).$user->id.date('is');
        $payment->save();
        return back()->with('success', 'Payment Processed Successfully');
        }else{
            return back()->with('error', 'Payment Failed');
        }
    }
}
