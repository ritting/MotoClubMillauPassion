<?php

namespace App\BO;

use Illuminate\Database\Eloquent\Model;

class Actu extends Model
{
    //BO des actu

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
     * @var string
     */
    private $titre;

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @var string
     */
    private $description;

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @var boolean
     */
    private $prive;

    public function setPrive($prive)
    {
        $this->prive = $prive;
    }

    public function getPrive()
    {
        return $this->prive;
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

    function __construct($row)
    {
        $this->setId($row->id);
        $this->setTitre($row->titre);
        $this->setDescription($row->description);
        $this->setPrive($row->prive);
        $this->setCreated_At($row->created_at);
        $this->setUpdated_At($row->updated_at);

        return $this;
    }


}
