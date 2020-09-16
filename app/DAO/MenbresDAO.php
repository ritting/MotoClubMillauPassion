<?php

namespace App\DAO;

use DB;
use App\BO\Menbres;

class MenbresDAO
{

    public function getAllMenbres()
    {
        $result = DB::table('users')->orderBy('id', 'desc')->paginate(10);
        return $result;
//        $result = DB::table('users')->orderBy('id', 'desc')->get();
//
//        //tableau qui recoit les randonnées
//        $listMenbres = [];
//
//        //boucle sur les lignes pour lister les objets randonnees
//        foreach ($result as $row){
//            $menbre = new Menbres($row);
//
//            //ajout des objets dans la liste
//            $listMenbres[] = $menbre;
//        }
//        return $listMenbres;
    }

    public function MenbreAccepter($request)
    {
        DB::table('users')->where('id', '=' , $request->input('id'))->update(
            [
                'verifie' => 1,
            ]
        );
    }

    public function MenbreDesaccepter($request)
    {
        DB::table('users')->where('id', '=' , $request->input('id'))->update(
            [
                'verifie' => 0,
            ]
        );
    }

    public function MenbreAdmin($request)
    {
        DB::table('users')->where('id', '=' , $request->input('id'))->update(
            [
                'admin' => 1,
            ]
        );
    }

    public function MenbreDesadmin($request)
    {
        DB::table('users')->where('id', '=' , $request->input('id'))->update(
            [
                'admin' => 0,
            ]
        );
    }

    public function deleteById($request)
    {
        DB::table('users')->where('id', '=' , $request->input('id'))->delete();
    }
}
