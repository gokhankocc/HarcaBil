<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Services;
use App\Models\Site\About;
use App\Models\Site\BlogCategory;
use App\Models\Site\Slider;
use App\Models\Site\Blog;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        //dd(auth('user')->user());


        return view('site.pages.auth.login');
    }

    public function login(Request $request)
    {
        //dd($request->all());

        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            request()->session()->regenerate();

            return redirect()->route('user.account')->with('success','Giriş yapıldı');
        } else {
            return redirect()->back()->with('error','mail veya şifre hatalı');
        }
    }

    public function register(Request $request)
    {
        //dd(auth('user')->user());

        return view('site.pages.auth.register');
    }

    public function userStore(Request $request)
    {
        //dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::guard('user')->login($user);

        return redirect()->route('user.account')->with('success','Hesap Oluşturuldu');
        //dd(auth('user')->user());
    }

}
