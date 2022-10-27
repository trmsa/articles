<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Biology;
use App\Models\Physics;
use App\Models\Aerospace;
use App\Models\Cosmology;
use App\Models\Upgrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'active']);
    }


    public function index()
    {
        $user = Auth::user();
        $major = $user->major;
        if ($major === 'نجوم') {
            $articles = Cosmology::where('user_id', $user->id)->get();
            $routeName = 'cosmologies';
            $routeParam = 'cosmology';
        } elseif ($major === 'مهندسی هوافضا') {
            $articles = Aerospace::where('user_id', $user->id)->get();
            $routeName = 'aerospaces';
            $routeParam = 'aerospace';
        } elseif ($major === 'زیست شناسی') {
            $articles = Biology::where('user_id', $user->id)->get();
            $routeName = 'biologys';
            $routeParam = 'biology';
        } elseif ($major === 'فیزیک') {
            $articles = Physics::where('user_id', $user->id)->get();
            $routeName = 'physics';
            $routeParam = 'physic';
        }

        return view('pages.account.index', compact(['articles', 'routeName', 'routeParam']));
    }



    public function edit()
    {
        $user = Auth::user();
        $major = $user->major;

        if ($major === 'نجوم') {
            $articles = Cosmology::where('user_id', $user->id)->get();
            $routeName = 'cosmologies';
            $routeParam = 'cosmology';
        } elseif ($major === 'مهندسی هوافضا') {
            $articles = Aerospace::where('user_id', $user->id)->get();
            $routeName = 'aerospaces';
            $routeParam = 'aerospace';
        } elseif ($major === 'زیست شناسی') {
            $articles = Biology::where('user_id', $user->id)->get();
            $routeName = 'biologys';
            $routeParam = 'biology';
        } elseif ($major === 'فیزیک') {
            $articles = Physics::where('user_id', $user->id)->get();
            $routeName = 'physics';
            $routeParam = 'physic';
        }

        return view('pages.account.edit', compact(['user', 'routeName']));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'degree' => 'required',
            'university' => 'required|string|max:255',
            'data_graduation' => 'required|date',
            'major' => 'required|string|max:255',
            'img_degree' => 'required|image'
        ]);

        $file = Storage::putFile('degreeImages', $request->file('img_degree'));
        $path = substr($file,13);
        Upgrade::create([
            'user_id' => $id,
            'degree' => $request->degree,
            'university' => $request->university,
            'data_graduation' => $request->data_graduation,
            'major' => $request->major,
            'img_degree' => $path
        ]);

        session()->flash('upgrade', 'درخواست ارتقاء مدرک تحصیلی شما ثبت گردید و بعد از تایید در حساب کاربریتان اعمال می گردد.');
        return to_route('account.index');
    }

    public function showFormPassword()
    {
        $user = Auth::user();

        $major = $user->major;

        if ($major === 'نجوم') {
            $articles = Cosmology::where('user_id', $user->id)->get();
            $routeName = 'cosmologies';
            $routeParam = 'cosmology';
        } elseif ($major === 'مهندسی هوافضا') {
            $articles = Aerospace::where('user_id', $user->id)->get();
            $routeName = 'aerospaces';
            $routeParam = 'aerospace';
        } elseif ($major === 'زیست شناسی') {
            $articles = Biology::where('user_id', $user->id)->get();
            $routeName = 'biologys';
            $routeParam = 'biology';
        } elseif ($major === 'فیزیک') {
            $articles = Physics::where('user_id', $user->id)->get();
            $routeName = 'physics';
            $routeParam = 'physic';
        }

        return view('pages.account.password', compact(['user', 'routeName']));
    }


    public function passwordUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $hashedPassword = $user->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);

           User::find($id)->update([
                'password' => Hash::make($request->password),
            ]);

            session()->flash('changed-password', 'رمز عبور شما با موفقیت تغییر پیدا کرد.');
            return to_route('account.index');
        } else {
            session()->flash('fail-password', 'پسورد قبلی وارد شده صحیح نمی باشد.');
            return to_route('password.form');
        }
    }
}
