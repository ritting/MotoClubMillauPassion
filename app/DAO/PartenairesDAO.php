<?php


namespace App\DAO;

use DB;

class PartenairesDAO
{
    public function get()
    {
        $partenaires = DB::table('partenaires')->get();;
        return $partenaires;
    }

    public function insert($lien_image, $lien_site)
    {
        DB::table('partenaires')->insert(
            [
                'lien_image' => $lien_image,
                'lien_site' =>  $lien_site,
            ]
        );
    }

    public function delete($id)
    {
        DB::table('partenaires')->where('id', '=' , $id)->delete();
    }
}
