<?php


namespace App\DAO;

use DB;

class SortiesDAO
{

    public function getAllSorties()
    {
        $sorties = DB::table('sorties')->orderBy('id', 'desc')->paginate(5);
        return $sorties;
    }

    public function getSortieById($id)
    {
        $result = DB::table('sorties')->where('id', '=', $id)->first();
        return $result;
    }

    public function insertSortie($request)
    {
        $id = DB::table('sorties')->insertGetId(
            [
                'titre' => $request->input('titre'),
                'description' =>  $request->input('description'),
                'lieu' => $request->input('lieu'),
                'jour' => date('Y-m-d H:i:s'),
            ]
        );
        return $id;
    }

    public function updateSortie($request)
    {
        DB::table('sorties')->where('id', '=' , $request->input('id'))->update(
            [
                'titre' => $request->input('titre'),
                'description' =>  $request->input('description'),
                'lieu' => $request->input('lieu'),
                'jour' => date('Y-m-d H:i:s'),
            ]
        );
    }

    public function deleteById($id)
    {
        DB::table('sorties')->where('id', '=' , $id)->delete();
    }

    public function getBenevolesFromIdSortie($id)
    {
        $result = DB::table('users')
            ->join('benevoles', 'users.id', '=', 'benevoles.user_id')
            ->where('benevoles.sorties_id', '=', $id)
            ->get();
        //dd($result);
        return $result;
    }

    public function getParticipantsFromIdSortie($id)
    {
        $result = DB::table('users')
            ->join('participants', 'users.id', '=', 'participants.user_id')
            ->where('participants.sorties_id', '=', $id)
            ->get();
        //dd($result);
        return $result;
    }
}
