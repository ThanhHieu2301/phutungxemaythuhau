<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ProductCategory;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;    
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    //
    public function check_login(Request $request)
    {
        // $data = $request->only('email','password');
        // if(Auth::guard('cus')->attempt($data, $request->has('remember'))){
        //     return redirect()->route('index');
        // }

        // return redirect()->back();  
            // v2
        $data = $request->only('email','password');
        $check_login = Auth::guard('cus')->attempt($data);
        if($check_login){
            if(Auth::guard('cus')->user()->status == 0)
            {
                Auth::guard('cus')->logout();   
                return redirect()->route('auth.login')->with('no','Vui lòng kiểm tra email để kích hoạt tài khoản');
            }
            return redirect()->route('index');
        }
        return redirect()->back();  
    }

    public function test_email()
    {
        $name = 'Mail từ trang web phụ tùng Thu Hậu';
        Mail::send('front.auth.test',compact('name'), function($email){
            $email->to('thanhhieu039@gmail.com','Phụ tùng Thu Hậu');
        });
    }
                                                                                                    // quen mat khau
    public function forgetPass(){
        $categories = ProductCategory::all(); 
        return view('front.auth.forgetPass',compact('categories'));
    }

    public function postforgetPass(Request $request)
    { 
        $request->validate([
            'email' => 'required|exists:customers'
        ],[
            'email.required' =>'Vui lòng nhập địa chỉ email hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống'  
        ]);
        
        $customer = Customer::where('email', $request->email)->first();
        $token = strtoupper(Str::random(10));
        $customer->update(['token' => $token]);
        
        Mail::send('front.auth.check_email_forget',compact('customer'), function($email) use($customer) {
            $email->subject('Phụ Tùng Thu Hậu - Lấy lại mật khẩu');
            $email->to($customer->email,$customer->name);
        });
            return redirect()->back()->with('yes','Vui lòng kiểm tra email');
    }
                                                                                                    // doi mat khau
    public function getPass(Customer $customer, $token)
    {
        $categories = ProductCategory::all(); 
        if($customer->token === $token)
        {
            return view('front.auth.getPass',compact('categories'));
        }
        return abort(404);
    }

    public function postgetPass(Customer $customer, $token, Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confim_password' => 'required|same:password',
        ]);
        $password_h = bcrypt($request->password);
        $customer->update(['password' => $password_h, 'token' => null]);
        return redirect()->route('auth.login')->with('yes','Đặt lại mật khẩu thành công');
    }
                                                                                                    // kich hoat tai khoan
    public function getActived()
    {
        return view('front.auth.getActived');
    }

    public function postgetActived(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:customers'
        ],[
            'email.required' =>'Vui lòng nhập địa chỉ email hợp lệ',
            'email.exists' => 'Email không tồn tại trong hệ thống'  
        ]);
        
        $customer = Customer::where('email', $request->email)->first();
        $token = strtoupper(Str::random(10));
        $customer->update(['token' => $token]);
        
        Mail::send('front.auth.active_account',compact('customer'), function($email) use($customer) {
            $email->subject('Phụ Tùng Thu Hậu - Lấy lại mật khẩu');
            $email->to($customer->email,$customer->name);
        });
            return redirect()->back()->with('yes','Vui lòng kiểm tra email');
    }

}
