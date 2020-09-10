<?php


namespace App\DAO;

use DB;

class ReglementDAO
{

    public function get()
    {
        $reglement = DB::table('reglement')->get();;
        return $reglement;
    }

    public function insert($request)
    {
        DB::table('reglement')->insert(
            [
                'article' => $request->input('article'),
                'texte' =>  $request->input('texte'),
                'created_at' => date('Y-m-d H:i:s'),
            ]
        );
    }

    public function insertPhoto($name)
    {
        DB::table('reglement')->insert(
            [
                'article' => 'photo',
                'texte' =>  $name,
                'created_at' => date('Y-m-d H:i:s'),
            ]
        );
    }

    public function update($request)
    {
        DB::table('reglement')->where('id', '=' , $request->input('id'))->update(
            [
                'article' => $request->input('article'),
                'texte' =>  $request->input('texte'),
            ]
        );
    }

    public function delete($id)
    {
        DB::table('reglement')->where('id', '=' , $id)->delete();
    }
}
