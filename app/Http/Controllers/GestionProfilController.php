<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GestionProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('gestionProfil');
    }

    public function store(newsRequest $request)
    {
        if($request->input('email') != Auth::user()->email)
        {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'adresse' => ['required', 'string', 'max:255'],
                'code_postal' => ['required', 'digits:5'],
                'ville' => ['required', 'string', 'max:50'],
                'telephone' => ['required', 'digits:10'],
                'date_de_naissance' => ['required'],
                'ville_natale' =>['required'],
                'categorie' =>['required'],
            ]);
        }
        else
        {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'code_postal' => ['required', 'digits:5'],
                'ville' => ['required', 'string', 'max:50'],
                'telephone' => ['required', 'digits:10'],
                'date_de_naissance' => ['required'],
                'ville_natale' =>['required'],
                'categorie' =>['required'],
            ]);
        }

        if ($validator->fails()) {
            return back()->with('message', 'Il y a des erreurs dans votre saisie : Retournez sur la fiche...')
                ->withInput()
                ->withErrors($validator);
        }

        if (isset($_POST['modifier'])) {
            var_dump('test2');
            if (isset($request->photo)) {
                //GERER LA SUPPRESSION DES ANCIENNES IMAGES LORS DE LA MISE EN PRODUCTION
                //unlink('img/' . $request->input('cheminphoto'));

                $imageName = $request->email . '.' . $request->photo->extension();
                //envoi de l'image dans le www
                $request->file('photo')->move('img/user/', $imageName);
            } else {
                $imageName = $request->chemin_photo;
            }
            DB::connection()->enableQueryLog();
            DB::table('users')->where('id', '=', $request->input('id'))->update(
                [
                    'name' => $request->input('name'),
                    'name_v' => $request->input('name_v') != 1 ? 0 : 1,
                    'email' => $request->input('email'),
                    'email_v' => $request->input('email_v') != 1 ? 0 : 1,
                    'adresse' => $request->input('adresse'),
                    'code_postal' => $request->input('code_postal'),
                    'ville' => $request->input('ville'),
                    'adresse_v' => $request->input('adresse_v') != 1 ? 0 : 1,
                    'telephone' => $request->input('telephone'),
                    'telephone_v' => $request->input('telephone_v') != 1 ? 0 : 1,
                    'chemin_photo' => $imageName,
                    'photo_v' => $request->input('photo_v') != 1 ? 0 : 1,
                    'date_de_naissance' => $request->input('date_de_naissance'),
                    'date_de_naissance_v' => $request->input('date_de_naissance_v') != 1 ? 0 : 1,
                    'ville_natale' => $request['ville_natale'],
                    'categorie' => $request['categorie'],
                ]
            );
            $queries = DB::getQueryLog();
            var_dump($queries);
            return redirect('gestionProfil')->with('sukces', 'Profil mis à jour.');
        } elseif (isset($_POST['supprimer']) && $request->input('id') === Auth::user()->id) {
            var_dump('test suppression');
            DB::table('users')->where('id', '=', $request->input('id'))->delete();
            return view('welcome');;
        } else {
            var_dump('test rien');
            return redirect('home');
        }

    }
}
