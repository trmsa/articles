<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'father-name' => ['required', 'string', 'max:255'],
            'date-birth' => ['required', 'date'],
            'national-code' => ['required', 'numeric'],
            'degree' => ['required'],
            'university' => ['required', 'string', 'max:255'],
            'major' => ['required', 'string', 'max:255'],
            'data-graduation' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last-name'],
            'father_name' => $data['father-name'],
            'date_birth' => $data['date-birth'],
            'national_code' => $data['national-code'],
            'degree' => $data['degree'],
            'university' => $data['university'],
            'major' => $data['major'],
            'data_graduation' => $data['data-graduation'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


}
