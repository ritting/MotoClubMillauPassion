<?php

namespace App\BO;

use Illuminate\Database\Eloquent\Model;

class PhotoActu extends Model
{
    //BO des photo des actualites

    /**
     * @var int
     */
    private $id;

    public function setId($id){

        $this->id = $id;

    }
    public function getId(){

        return $this->id;
    }

    /**
     * @var timestamp
     */
    private $created_at;

    public function setCreated_At($created_at){

        $this->created_at = $created_at;

    }
    public function getCreated_At(){

        return $this->created_at;
    }

    /**
     * @var timestamp
     */
    private $updated_at;

    public function setUpdated_At($updated_at){

        $this->updated_at = $updated_at;

    }
    public function getUpdated_At(){

        return $this->updated_at;
    }

    /**
     * @var integer
     */
    private $id_actu;

    public function setId_actu($id_actu)
    {
        $this->id_actu = $id_actu;
    }

    public function getId_actu()
    {
        return $this->id_actu;
    }

    /**
     * @var string
     */
    private $chemin_photo;

    public function setChemin_photo($chemin_photo)
    {
        $this->chemin_photo = $chemin_photo;
    }

    public function getChemin_photo()
    {
        return $this->chemin_photo;
    }

    function __construct($row)
    {
        $this->setId($row->id);
        $this->setCreated_At($row->created_at);
        $this->setUpdated_At($row->updated_at);
        $this->setId_actu($row->id_actu);
        $this->setChemin_photo($row->chemin_photo);

        return $this;
    }


}
