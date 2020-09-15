<?php


namespace App\DAO;

use DB;

class BenevolesDAO
{

    public function getBenevoles($id)
    {
        return DB::table('benevoles')->where('sorties_id', '=', $id)->get();
    }

    public function getBenevole($id_sortie, $id_benevole)
    {
        $test = DB::table('benevoles')->where(
            [
                'sorties_id', '=', $id_sortie,
                'user_id', '=', $id_benevole,
            ]
            )->get();

        var_dump($test);
        return $test;
    }

    public function setBenevole($request)
    {
        DB::table('benevoles')->Insert(
            [
                'sorties_id' => $request->input('sorties_id'),
                'user_id' => $request->input('user_id'),
            ]
        );
    }

    public function desetBenevole($request)
    {
        DB::table('benevoles')->where(
            [
                'sorties_id' => $request->input('sorties_id'),
                'user_id' => $request->input('user_id'),
            ]
        )->delete();
    }

    public function deleteSortie($id)
    {
        DB::table('benevoles')->where('sorties_id', '=', $id)->delete();
    }


}
