<?php


namespace App\DAO;

use DB;

class PhotoSortiesDAO
{

    //get all pictures from a sortie
    public function getPhotosById($id)
    {
        $result = DB::table('photo_sorties')->where('id_sorties', '=', $id)->get();
        return $result;
    }

    //insert the way to accces to a photo to the database
    public function insertPhoto($id, $name)
    {
        DB::table('photo_sorties')->Insert(
            [
                'id_sorties' => $id,
                'chemin_photo' => $name,
            ]
        );
    }

    //get one single photo from a sortie
    public function getRandomPhoto($id)
    {
        $photo = DB::table('photo_sorties')->where('id_sorties', '=', $id)->inRandomOrder()->first();
        return $photo;
    }

    //delete all pictures from a sortie
    public function deletePhotosFromIdSorties($id_sorties)
    {
        DB::table('photo_sorties')->where('id_sorties', '=', $id_sorties)->delete();
    }

    //delelte one picture from a sortie
    public function deletePhotosFromId($id)
    {
        DB::table('photo_sorties')->where('id', '=', $id)->delete();
    }
}
