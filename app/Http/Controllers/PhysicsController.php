<?php

namespace App\Http\Controllers;

use App\Models\Physics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PhysicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth','active'], ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    
    public function index()
    {
        $physics = Physics::latest()->paginate(20);
        
        return view('pages.physic.index', compact('physics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create', Physics::class);
        return view('pages.physic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Physics::class);
        $user = Auth::user();
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'abstract' => 'required|string|min:255|max:1000',
            'body' => 'required|string|min:2000',
            'indicator-img' => 'required|image'
        ]);

        $file = Storage::putFile('public', $request->file('indicator-img'));
        $path = substr($file,7);

        Physics::create([

            'user_id' => $user->id,
            'title' => $request->title,
            'indicator_img' => $path,
            'abstract' => $request->abstract,
            'body' => $request->body
        ]);

        session()->flash('create-success', 'مقاله شما با موفقیت در سایت منتشر گردید.');
        return to_route('account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Physics $physic)
    {
        $physicImages =  $physic->images;
        
        return view('pages.physic.show', compact('physic', 'physicImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Physics::find($id);
        Gate::authorize('update', $article);

        return view('pages.physic.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Physics::find($id);
        Gate::authorize('update', $article);
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'abstract' => 'required|string|min:255|max:1000',
            'body' => 'required|string|min:2000',
            'indicator_img' => 'image'
        ]);


        if(isset($request->indicator_img)) {
            $file = Storage::putFile('public', $request->file('indicator_img'));
            $path = substr($file,7);
        } else {
            $artPath = Physics::find($id)->indicator_img;
            $path = $artPath;
        }

        Physics::find($id)->update([

            'title' => $request->title,
            'indicator_img' => $path,
            'abstract' => $request->abstract,
            'body' => $request->body
        ]);

        session()->flash('update-success', 'مقاله شما با موفقیت ویرایش شد.');
        return to_route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Physics::find($id);
        Gate::authorize('delete', $article);
        Physics::find($id)->delete();
        session()->flash('deleted', 'مقاله مورد نظر شما با موفقیت حذف شد.');
        return to_route('account.index');
    }
}
