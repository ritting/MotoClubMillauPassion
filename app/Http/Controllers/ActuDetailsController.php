<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use App\DAO\ActuDAO;
use App\DAO\PhotoActuDAO;
use Illuminate\Support\Facades\Auth;

//this controller is for get a specified actu with all the details
class ActuDetailsController extends Controller
{
    protected $actuDAO;

    public function __construct()
    {
        $this->actuDAO = new ActuDAO();
        $this->PhotoActuDAO = new PhotoActuDAO();
    }

    public function index($id)
    {
        $actu = $this->actuDAO->getActuById($id);
        $listphoto = $this->PhotoActuDAO->getPhotoById($actu->getId());
        if($actu->getPrive() === 1)
        {
            if(Auth::check() && Auth::User()->verifie === 1)
            {
                return view('actudetails', compact('actu'), compact('listphoto'));
            }else
            {
                return redirect()->to('/');
            }
        }else
        {
            return view('actudetails', compact('actu'), compact('listphoto'));
        }
    }

    public function deletePhoto(newsRequest $request)
    {
        if (!Auth::check() && !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        $this->PhotoActuDAO->deletePhotosFromId($request->input('id'));
        $actu = $this->actuDAO->getActuById($request->input('id_actu'));
        $listphoto = $this->PhotoActuDAO->getPhotoById($actu->getId());
        return view('actudetails', compact('actu'), compact('listphoto'));
    }

}
