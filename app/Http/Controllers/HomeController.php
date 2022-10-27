<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Aerospace;
use App\Models\Biology;
use App\Models\Contact;
use App\Models\Cosmology;
use App\Models\Physics;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        

        $lateAerospaces = Aerospace::latest()->take(3)->get();
        $lateBiologies = Biology::latest()->take(3)->get();
        $lateCosmologies = Cosmology::latest()->take(3)->get();
        $latePhysics = Physics::latest()->take(3)->get();

        return view('pages.home', compact(['lateAerospaces', 'lateBiologies', 'lateCosmologies', 'latePhysics']));
    }

    public function about()
    {

        // get about text from DB

        $about = About::find(1);
        // send about text to view

        return view('pages.about', compact('about'));
    }


    public function contact()
    {

        $contact = Contact::find(1);

        return view('pages.contact', compact('contact'));
    }
}
