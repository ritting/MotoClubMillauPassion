<?php


namespace App\DAO;

use DB;

class ParticipantsDAO
{

    public function getParticipants($id)
    {
        return DB::table('participants')->where('sorties_id', '=', $id)->get();
    }

    public function getParticipant($id_sortie, $id_participant)
    {
        return DB::table('participants')->where('sorties_id', '=', $id_sortie)->where('user_id', '=', $id_participant)->first();
    }

    public function setParticipants($request)
    {
        DB::table('participants')->insert(
            [
                'sorties_id' => $request->input('sorties_id'),
                'user_id' => $request->input('user_id'),
            ]
        );
    }

    public function desetParticipants($request)
    {
        DB::table('participants')->where(
            [
                'sorties_id' => $request->input('sorties_id'),
                'user_id' => $request->input('user_id'),
            ]
        )->delete();
    }

    public function deleteSortie($id)
    {
        DB::table('participants')->where('sorties_id', '=', $id)->delete();
    }


}
