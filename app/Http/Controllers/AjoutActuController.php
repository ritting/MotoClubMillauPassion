<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use App\DAO\ActuDAO;
use App\DAO\PhotoActuDAO;

//this controller is for add a new actu, only the admins can use it
class AjoutActuController extends Controller
{
    private $actuDAO;
    private $photoActuDAO;

    public function __construct()
    {
        $this->middleware('admin');
        $this->actuDAO = new ActuDAO();
        $this->photoActuDAO = new PhotoActuDAO();
    }

    public function index()
    {
        return view('ajoutActu');
    }

    public function store(newsRequest $request)
    {
        //add text
        if (isset($_POST['ajouter']))
        {
            $id = $this->actuDAO->insertActu($request);
        }elseif(isset($_POST['modifier']))
        {
            $id = $request->input('id');
            $this->actuDAO->updateActu($request);
        }
        //add pictures
        if(isset($request->photo0)){
            usleep(850000);
            $name = time() . $request->photo0->extension();
            $this->photoActuDAO->insertPhoto($id, $name);
            $request->file('photo0')->move('img/actu/', $name);
        }
        if(isset($request->photo1)){
            usleep(850000);
            $name = time() . $request->photo1->extension();
            $this->photoActuDAO->insertPhoto($id, $name);
            $request->file('photo1')->move('img/actu/', $name);
        }
        if(isset($request->photo2)){
            usleep(850000);
            $name = time() . $request->photo2->extension();
            $this->photoActuDAO->insertPhoto($id, $name);
            $request->file('photo2')->move('img/actu/', $name);
        }
        if(isset($request->photo3)){
            usleep(850000);
            $name = time() . $request->photo3->extension();
            $this->photoActuDAO->insertPhoto($id, $name);
            $request->file('photo3')->move('img/actu/', $name);
        }
        return redirect('actu');
    }


}
