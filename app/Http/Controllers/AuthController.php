<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // عرض صفحة التسجيل
    public function register()
    {
        return view('register');
    }

    // معالجة بيانات التسجيل
    public function registerPost(Request $request)
    {
        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shipping_address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // تخزين صورة الملف الشخصي إذا كانت موجودة
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures');
        }

        // إنشاء المستخدم
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_picture = $profilePicturePath;
        $user->shipping_address = $request->shipping_address;
        $user->phone_number = $request->phone_number;

        $user->save();

        // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول بعد التسجيل الناجح
        return redirect()->route('login')->with('success', 'تم التسجيل بنجاح، يرجى تسجيل الدخول.');
    }

    // عرض صفحة تسجيل الدخول
    public function login()
    {
        return view('login');
    }

    // معالجة بيانات تسجيل الدخول
    public function loginPost(Request $request)
    {
        // التحقق من صحة البيانات
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // محاولة تسجيل الدخول
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/home')->with('success', 'Login Success');
        }

        return back()->with('error', 'Error Email or Password');
    }

    // تسجيل الخروج
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
