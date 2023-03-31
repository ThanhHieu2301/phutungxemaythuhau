<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    // ca nhan khach hang
    public function profile(){
        $categories = ProductCategory::all(); 
        $cus = Auth::guard('cus')->user();
        return view('front.auth.profile',compact('cus','categories'));
    }
    public function update_profile(Request $request){
        $cus = Auth::guard('cus')->user();

        if($request->password){
            $request->validate([
            'password' => 'required',
            ]);
            $pass_hashed = bcrypt($request->password);
            $request->merge(['password' => $pass_hashed]);
        }
        else{
          $request->merge(['password' => $cus->password]);
        }
        $data = $request->only('name','email','name');
            if($cus->update($data)){
                return redirect()->back();
            }
        return redirect()->back();
    }
                                                                            // dang ki
    public function register(){
        $categories = ProductCategory::all(); 
        return view('front.auth.register',compact('categories'));
    }
    public function check_register(Request $request){
        $categories = ProductCategory::all(); 
        $request->validate([
            'password' => 'required',
            'confim_password' => 'required|same:password'
        ]);
        $token = strtoupper(Str::random(10));
        $pass_hashed = bcrypt($request->password);
        // $request->merge(['password' => $pass_hashed]);
        $data = $request->only('name','email','password');
        $data['password'] = $pass_hashed;
        $data['token'] = $token;

        if($customer = Customer::create($data)){
            Mail::send('front.auth.active_account',compact('customer'), function($email) use($customer){
                $email->subject('Phụ tùng Thu Hậu - Xác nhận tài khoản');
                $email->to($customer->email,$customer->name);
            });
            return view('front.auth.login',compact('categories'))->with('yes','Đăng kí thành công, vui lòng kiểm tra email để kích hoạt tài khoản');
        }
        return redirect()->back();
    }
    // public function register_user(Request $request)
    // {
    //     Customer::create([
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=>bcrypt($request->password),
    //     ]);
    //     return redirect()->back();
    // }

                                                                            // dang nhap
   public function login(){
    $categories = ProductCategory::all(); 
        return view('front.auth.login' ,compact('categories'),[
            'title' => 'Login'
        ]);
    }
    public function store (Request $request)
    {
        $categories = ProductCategory::all(); 
        $data = $request->only('email','password');
        $check_login = Auth::guard('cus')->attempt($data);
        if($check_login){
            if(Auth::guard('cus')->user()->status == 0)
            {
                Auth::guard('cus')->logout();   
                return redirect()->route('auth.login')->with('no','Vui lòng kiểm tra email để kích hoạt tài khoản');
            }
            return redirect()->route('user');
        }

        // xác nhận email đăng kí cần xác nhận từ email

        // $remember = isset($request->input('remember')) ? true : faise;
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
       if (Auth::attempt([
           'email'=> $request->input('email'),
           'password'=>$request->input('password'), ],

           $request->input('remember')))
            {
               return redirect()->route('admin');
            }
       $data = $request->only('email','password');
       if(Auth::guard('cus')->attempt($data, $request->has('remember'))){
           return redirect()->route('user');
       }

       return redirect()->back()->with('no','Thông tin không chính xác');
      
    //    Session::flash('error','Email hoặc password không chính xác!');

       return redirect()->back();
    }
                                                                                // kich hoat tai khoan
    public function actived(Customer $customer, $token)
    {
        $categories = ProductCategory::all(); 
         if($customer->token === $token){
             $customer->update(['status'=>1]);
             return view('front.auth.login',compact('categories'))->with('yes','Kích hoạt tài khoản thành công');
         }else{
            return view('front.auth.login',compact('categories'))->with('no','Mã xác nhận không hợp lệ');
         }
    }

                                                                                // dang xuat
    public function logout(Request $request){
        $categories = ProductCategory::all(); 
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('front.auth.login',compact('categories'));
    }

    public function logout_customer(Request $request){
        $categories = ProductCategory::all(); 
        Auth::guard('cus')->logout();
        return view('front.auth.login',compact('categories'));
    }

}
