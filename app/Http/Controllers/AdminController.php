<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\About;
use App\Models\Biology;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Physics;
use App\Models\Upgrade;
use App\Models\Aerospace;
use App\Models\Cosmology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'active']);
    }


    public function index()
    {
        Gate::authorize('admin');
        return view('pages.admin.index');
    }


    public function cosmology()
    {
        Gate::authorize('admin');
        $user = Auth::user();
        $routeName = 'cosmologies';
        $routeParam = 'cosmology';
        $articles = Cosmology::where('user_id', $user->id)->get();
        return view('pages.admin.articles', compact(['articles', 'routeName', 'routeParam']));
    }


    public function aerospace()
    {
        Gate::authorize('admin');
        $user = Auth::user();
        $routeName = 'aerospaces';
        $routeParam = 'aerospace';
        $articles = Aerospace::where('user_id', $user->id)->get();
        return view('pages.admin.articles', compact(['articles', 'routeName', 'routeParam']));
    }


    public function biology()
    {
        Gate::authorize('admin');
        $user = Auth::user();
        $routeName = 'biologys';
        $routeParam = 'biology';
        $articles = Biology::where('user_id', $user->id)->get();
        return view('pages.admin.articles', compact(['articles', 'routeName', 'routeParam']));
    }


    public function physic()
    {
        Gate::authorize('admin');
        $user = Auth::user();
        $routeName = 'physics';
        $routeParam = 'physic';
        $articles = Physics::where('user_id', $user->id)->get();
        return view('pages.admin.articles', compact(['articles', 'routeName', 'routeParam']));
    }

    public function create()
    {
        Gate::authorize('admin');
        return view('pages.admin.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('admin');
        $user = Auth::user();
        $request->validate([
            'major' => 'required',
            'title' => 'required|string|min:5|max:255',
            'abstract' => 'required|string|min:255|max:1000',
            'body' => 'required|string|min:2000',
            'indicator-img' => 'required|image'
        ]);

        $file = Storage::putFile('public', $request->file('indicator-img'));
        $path = substr($file, 7);

        if ($request->major === 'کیهان شناسی') {
            Cosmology::create([

                'user_id' => $user->id,
                'title' => $request->title,
                'indicator_img' => $path,
                'abstract' => $request->abstract,
                'body' => $request->body
            ]);
        } elseif ($request->major === 'مهندسی هوافضا') {
            Aerospace::create([

                'user_id' => $user->id,
                'title' => $request->title,
                'indicator_img' => $path,
                'abstract' => $request->abstract,
                'body' => $request->body
            ]);
        } elseif ($request->major === 'زیست شناسی') {
            Biology::create([

                'user_id' => $user->id,
                'title' => $request->title,
                'indicator_img' => $path,
                'abstract' => $request->abstract,
                'body' => $request->body
            ]);
        } elseif ($request->major === 'فیزیک') {
            Physics::create([

                'user_id' => $user->id,
                'title' => $request->title,
                'indicator_img' => $path,
                'abstract' => $request->abstract,
                'body' => $request->body
            ]);
        }


        session()->flash('create-success', 'مقاله شما با موفقیت در سایت منتشر گردید.');
        return to_route('admin.index');
    }

    public function users()
    {
        Gate::authorize('admin');
        $users = User::where('status', 1)->get();
        return view('pages.admin.users', compact('users'));
    }


    public function approve()
    {
        Gate::authorize('admin');
        $users = User::where('status', 0)->get();
        return view('pages.admin.approve', compact('users'));
    }


    public function confirmUser($id)
    {
        Gate::authorize('admin');
        User::find($id)->update([
            'status' => '1'
        ]);

        session()->flash('confirm-user', 'کاربر مورد نظر تایید شد.');
        return to_route('admin.approve');
    }


    public function notApprovedUser($id)
    {
        Gate::authorize('admin');
        User::find($id)->delete();
        session()->flash('delete-user', 'کاربر مورد نظر حذف شد.');
        return to_route('admin.approve');
    }


    public function userSuspension($id)
    {
        Gate::authorize('admin');
        User::find($id)->update([
            'status' => 0
        ]);
        session()->flash('user-Suspension', 'کاربر مورد نظر تعلیق شد.');
        return to_route('admin.users');
    }


    public function download($file)
    {
        Gate::authorize('admin');
        return Storage::download('degreeImages/' . $file);
    }


    public function showPasswordForm()
    {
        Gate::authorize('admin');
        $user = Auth::user();
        return view('pages.admin.password', compact('user'));
    }


    public function passwordUpdate(Request $request, $id)
    {
        Gate::authorize('admin');
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
            return to_route('admin.index');
        } else {
            session()->flash('fail-password', 'پسورد قبلی وارد شده صحیح نمی باشد.');
            return to_route('admin.password');
        }
    }



    public function about()
    {
        Gate::authorize('admin');
        $about = About::find(1);
        return view('pages.admin.about', compact('about'));
    }


    public function contact()
    {
        Gate::authorize('admin');
        $contact = Contact::find(1);
        return view('pages.admin.contact', compact('contact'));
    }
 
    
    public function aboutEdit(Request $request)
    {
        Gate::authorize('admin');   
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'end' => 'required'
        ]);

        $id = 1;
        About::updateOrCreate(['id' => $id],[
            'title' => $request->title,
            'body' => $request->body,
            'end' => $request->end
        ]);

        session()->flash('about', 'محتوای صفحه درباره ما با موفقیت ایجاد/ویرایش شد.');
        return to_route('admin.index');
    }
 
    
    public function contactEdit(Request $request)
    {
        Gate::authorize('admin');
        
        $request->validate([
            'tel_manag' => 'required',
            'tel_public' => 'required',
            'tel_deputy' => 'required',
            'email' => 'required|email',
            'postal_code' => 'required',
            'address' => 'required',
        ]);

        $id = 1;
        Contact::updateOrCreate(['id' => $id],[
            'tel_manag' => $request->tel_manag,
            'tel_public' => $request->tel_public,
            'tel_deputy' => $request->tel_deputy,
            'email' => $request->email,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
        ]);

        session()->flash('contact', 'محتوای صفحه ارتباط با ما با موفقیت ایجاد/ویرایش شد.');
        return to_route('admin.index');
    }


    public function upgradeDegree() {
        Gate::authorize('admin');
        $users = DB::table('users')
            ->join('upgrades', 'users.id', '=', 'upgrades.user_id')
            ->select('users.name', 'users.last_name', 'users.father_name', 'users.date_birth', 'users.national_code', 'upgrades.*')
            ->get();

        return view('pages.admin.upgrade', compact('users'));
    }


    public function notApprovedDegree($id) {
        Gate::authorize('admin');
        Upgrade::find($id)->delete();
        session()->flash('delete-degree', 'درخواست ارتقاء مدرک حذف شد.');
        return to_route('admin.upgrade.degree');
    }


    public function approvedDegree($id) {
        Gate::authorize('admin');
        $upgrade = Upgrade::find($id);
        $user = User::find($upgrade->user_id)->update([
            'degree' => $upgrade->degree,
            'university' => $upgrade->university,
            'data_graduation' => $upgrade->data_graduation,
            'major' => $upgrade->major,
            'img_degree' => $upgrade->img_degree,
        ]);

        Upgrade::find($id)->delete();
        session()->flash('updated-degree', 'درخواست ارتقاء مدرک اعمال شد.');
        return to_route('admin.upgrade.degree');
    }
}
