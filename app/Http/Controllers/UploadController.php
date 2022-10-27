<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show()
    {
        return view('auth.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img-degree' => 'required|image'
        ]);
        $file = Storage::putFile('degreeImages', $request->file('img-degree'));
        $path = substr($file,13);
        $user = Auth::user();

        $respons = User::find($user->id)->update([
            'img_degree' => $path
        ]);

        

        if ($respons) {
            
            session()->flash('upload-success', 'ثبت نام شما موفقیت آمیز بود. در طول یک هفته آینده بعد از تایید اطلاعات ارسالی ،حساب کاربری شما فعال می گردد.');
           return to_route('home');
        } else {
            session()->flash('upload-fail', 'ارسال اطلاعات با خطا مواجه شد. لطفا مجددا تلاش نمایید.');
            return to_route('upload.show');
        }
    }


}
