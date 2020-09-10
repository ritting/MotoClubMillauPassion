<?php


namespace App\DAO;

use DB;
use App\BO\Actu;

class ActuDAO
{

    public function getAllActu()
    {
        $actus = DB::table('actu')->orderBy('id', 'desc')->paginate(5);;
        return $actus;
//        $result = DB::table('actu')->orderBy('id', 'desc')->get();
//
//        //tableau qui recoit les randonnées
//        $listActu = [];
//
//        //boucle sur les lignes pour lister les objets randonnees
//        foreach ($result as $row){
//
//            $actu = new Actu($row);
//
//            //ajout des objets dans la liste
//            $listActu[] = $actu;
//        }
//        return $listActu;
    }

    public function getPublicActu()
    {
        $actus = DB::table('actu')->where('prive', '=' , '0')->orderBy('id', 'desc')->paginate(5);
        return $actus;
//        $result = DB::table('actu')->where('prive', '=' , '0')->orderBy('id', 'desc')->get();
//
//        //tableau qui recoit les actu
//        $listActu = [];
//
//        //boucle sur les lignes pour lister les objets actu
//        foreach ($result as $row){
//
//            $actu = new Actu($row);
//
//            //ajout des objets dans la liste
//            $listActu[] = $actu;
//        }
//        return $listActu;
    }

    public function getActuById($id)
    {
        $result = DB::table('actu')->where('id', '=', $id)->first();
        return new Actu($result);
    }

    public function insertActu($request)
    {
        $id = DB::table('actu')->insertGetId(
            [
                'titre' => $request->input('titre'),
                'description' =>  $request->input('description'),
                'prive' => $request->input('prive') != 1 ? 0 : 1,
                'created_at' => date('Y-m-d H:i:s'),
            ]
        );
        return $id;
    }

    public function updateActu($request)
    {
        DB::table('actu')->where('id', '=' , $request->input('id'))->update(
            [
                'titre' => $request->input('titre'),
                'description' =>  $request->input('description'),
                'prive' => $request->input('prive') != 1 ? 0 : 1,
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
    }

    public function deleteById($id)
    {
        DB::table('actu')->where('id', '=' , $id)->delete();
    }
}
