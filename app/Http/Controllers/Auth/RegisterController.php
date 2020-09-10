<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $this->middleware('guest');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'adresse' => ['required', 'string', 'max:255'],
            'code_postal' => ['required', 'digits:5'],
            'ville' => ['required', 'string', 'max:50'],
            'telephone' => ['required', 'digits:10'],
            'date_de_naissance' => ['required'],
            'ville_natale' => ['required'],
            'categorie' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $name = !isset($data['name_v'])? 0 : 1;
        $email = !isset($data['email_v']) ? 0 : 1;
        $adresse = !isset($data['adresse_v']) ? 0 : 1;
        $telephone = !isset($data['telephone_v']) ? 0 : 1;
        $date = !isset($data['date_de_naissance_v']) ? 0 : 1;
        var_dump($data);
        return User::create([
            'name' => $data['name'],
            'name_v' => $name,
            'email' => $data['email'],
            'email_v' => $email,
            'password' => Hash::make($data['password']),
            'adresse' => $data['adresse'],
            'code_postal' => $data['code_postal'],
            'ville' => $data['ville'],
            'adresse_v' => $adresse,
            'telephone' => $data['telephone'],
            'telephone_v' => $telephone,
            'date_de_naissance' => $data['date_de_naissance'],
            'date_de_naissance_v' => $date,
            'ville_natale' => $data['ville_natale'],
            'categorie' => $data['categorie'],
        ]);
    }
}
