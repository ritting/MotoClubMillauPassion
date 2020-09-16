<?php


namespace App\DAO;

use App\BO\PhotoActu;
use DB;

class PhotoActuDAO
{
    //this function is for photos pages
    public function getPhotos()
    {
        return DB::table('photo_actu')->whereNotIn('id_actu', function($q){
            $q->select('id')->from('actu')->where('prive', '=', 1);
        })->inRandomOrder()->paginate(10);
    }

    public function getPhotoById($id)
    {
        $result = DB::table('photo_actu')->where('id_actu', '=', $id)->get();
        $listphotos = [];
        foreach ($result as $row)
        {
            $photo = new PhotoActu($row);
            $listphotos[] = $photo;
        }
        return $listphotos;
    }

    public function insertPhoto($id, $name)
    {
        DB::table('photo_actu')->Insert(
            [
                'id_actu' => $id,
                'chemin_photo' => $name,
            ]
        );
    }

    public function deletePhotosFromIdActu($idActu)
    {
        DB::table('photo_actu')->where('id_actu', '=', $idActu)->delete();
    }

    public function deletePhotosFromId($id)
    {
        DB::table('photo_actu')->where('id', '=', $id)->delete();
    }
}
