<?php

namespace App\BO;

use Illuminate\Database\Eloquent\Model;

class Menbres extends Model
{
    //BO des menbres

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
    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @var boolean
     */
    private $name_v;

    public function setName_v($name_v)
    {
        $this->name_v = $name_v;
    }

    public function getName_v()
    {
        return $this->name_v;
    }

    /**
     * @var string
     */
    private $email;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @var boolean
     */
    private $email_v;

    public function setEmail_v($email_v)
    {
        $this->email_v = $email_v;
    }

    public function getEmail_v()
    {
        return $this->email_v;
    }

    /**
     * @var string
     */
    private $adresse;

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @var string
     */
    private $code_postal;

    public function setCode_postal($code_postal)
    {
        $this->code_postal = $code_postal;
    }

    public function getCode_postal()
    {
        return $this->code_postal;
    }

    /**
     * @var string
     */
    private $ville;

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @var boolean
     */
    private $adresse_v;

    public function setAdresse_v($adresse_v)
    {
        $this->adresse_v = $adresse_v;
    }

    public function getAdresse_v()
    {
        return $this->adresse_v;
    }

    /**
     * @var string
     */
    private $telephone;

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @var boolean
     */
    private $telephone_v;

    public function setTelephone_v($telephone_v)
    {
        $this->telephone_v = $telephone_v;
    }

    public function getTelephone_v()
    {
        return $this->telephone_v;
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

    /**
     * @var boolean
     */
    private $photo_v;

    public function setPhoto_v($photo_v)
    {
        $this->photo_v = $photo_v;
    }

    public function getPhoto_v()
    {
        return $this->photo_v;
    }

    /**
     * @var date
     */
    private $date_de_naissance;

    public function setDate_de_naissance($date)
    {
        $this->date_de_naissance = $date;
    }

    public function getDate_de_naissance()
    {
        return $this->date_de_naissance;
    }

    /**
     * @var boolean
     */
    private $date_de_naissance_v;

    public function setDate_de_naissance_v($date_v)
    {
        $this->date_de_naissance_v = $date_v;
    }

    public function getDate_de_naissance_v()
    {
        return $this->date_de_naissance_v;
    }

    /**
     * @var boolean
     */
    private $verifie;

    public function setVerifie($verifie)
    {
        $this->verifie = $verifie;
    }

    public function getVerifie()
    {
        return $this->verifie;
    }

    /**
     * var date
     */
    private $created_at;

    public function setCreated_At($value)
    {
        $this->created_at = $value;
    }

    public function getCreated_At()
    {
        return $this->created_at;
    }

    function __construct($row)
    {
        $this->setId($row->id);
        $this->setName($row->name);
        $this->setName_v($row->name_v);
        $this->setEmail($row->email);
        $this->setEmail_v($row->email_v);
        $this->setAdresse($row->adresse);
        $this->setCode_postal($row->code_postal);
        $this->setVille($row->ville);
        $this->setAdresse_v($row->adresse_v);
        $this->setTelephone($row->telephone);
        $this->setTelephone_v($row->telephone_v);
        $this->setChemin_photo($row->chemin_photo);
        $this->setPhoto_v($row->photo_v);
        $this->setDate_de_naissance($row->date_de_naissance);
        $this->setDate_de_naissance_v($row->date_de_naissance_v);
        $this->setVerifie($row->verifie);
        $this->setCreated_At($row->created_at);


        return $this;
    }
}
