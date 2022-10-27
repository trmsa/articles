<?php

namespace App\Http\Controllers;

use App\Models\Cosmology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CosmologyController extends Controller
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
        $cosmologies = Cosmology::latest()->paginate(20);
        
        return view('pages.cosmology.index', compact('cosmologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create', Cosmology::class);
        return view('pages.cosmology.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Cosmology::class);
        $user = Auth::user();
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'abstract' => 'required|string|min:255|max:1000',
            'body' => 'required|string|min:2000',
            'indicator-img' => 'required|image'
        ]);

        $file = Storage::putFile('public', $request->file('indicator-img'));
        $path = substr($file,7);

        Cosmology::create([

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
    public function show(Cosmology $cosmology)
    {
        $cosmologyImages =  $cosmology->images;
        
        return view('pages.cosmology.show', compact('cosmology', 'cosmologyImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Cosmology::find($id);
        Gate::authorize('update', $article);

        return view('pages.cosmology.edit', compact('article'));
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
        $article = Cosmology::find($id);
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
            $artPath = Cosmology::find($id)->indicator_img;
            $path = $artPath;
        }

        Cosmology::find($id)->update([

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
        $article = Cosmology::find($id);
        Gate::authorize('delete', $article);
        Cosmology::find($id)->delete();
        session()->flash('deleted', 'مقاله مورد نظر شما با موفقیت حذف شد.');
        return to_route('account.index');
    }
}
