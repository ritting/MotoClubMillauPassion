<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;

class GestionActuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('ajoutActu');
    }

    public function store(newsRequest $request)
    {

        if (isset($_POST['modifier']))
        {
            if(isset($request->photo))
            {
                //GERER LA SUPPRESSION DES ANCIENNES IMAGES LORS DE LA MISE EN PRODUCTION
                //unlink('img/' . $request->input('cheminphoto'));

                $imageName = $request->email . '.' . $request->photo->extension();
                //envoi de l'image dans le www
                $request->file('photo')->move('img/user/', $imageName);
            }else
            {
                $imageName = $request->chemin_photo;
            }


            //DB::connection()->enableQueryLog();
            DB::table('users')->where('id', '=' , $request->input('id'))->update(
                [
                    'name' => $request->input('name'),
                    'name_v' =>   $request->input('name_v') != 1 ? 0 : 1,
                    'email' =>  $request->input('email'),
                    'email_v' =>  $request->input('email_v') != 1 ? 0 : 1,
                    'adresse' =>   $request->input('adresse'),
                    'code_postal' =>  $request->input('code_postal'),
                    'ville' => $request->input('ville'),
                    'adresse_v' => $request->input('adresse_v') != 1 ? 0 : 1,
                    'telephone' => $request->input('telephone'),
                    'telephone_v' => $request->input('telephone_v') != 1 ? 0 : 1,
                    'chemin_photo' => $imageName,
                    'photo_v' => $request->input('photo_v') != 1 ? 0 : 1,
                    'date_de_naissance' => $request->input('date_de_naissance'),
                    'date_de_naissance_v' => $request->input('date_de_naissance_v') != 1 ? 0 : 1,
                ]
            );
            //$queries = DB::getQueryLog();
            //var_dump($queries);
            return redirect('gestionProfil')->with('sukces', 'Profil mis à jour.');
        }
        elseif (isset($_POST['supprimer']))
        {
            DB::table('users')->where('id', '=' , $request->input('id'))->delete();
            return view('welcome');
        }

    }
}
