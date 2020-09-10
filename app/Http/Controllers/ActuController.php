<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use App\DAO\ActuDAO;
use App\DAO\PhotoActuDAO;
use Illuminate\Support\Facades\Auth;

class ActuController extends Controller
{
    protected $actuDAO;
    protected $photoActuDAO;

    public function __construct()
    {
        $this->actuDAO = new ActuDAO();
        $this->photoActuDAO = new PhotoActuDAO();
    }

    public function index()
    {
        if (Auth::check() && Auth::User()->verifie === 1)
        {
            $actus = $this->actuDAO->getAllActu();
        }
        else
        {
            $actus = $this->actuDAO->getPublicActu();
        }
        return view('actu', compact('actus'));
    }

    public function delete(newsRequest $request)
    {
        if (!Auth::check() && !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        $this->actuDAO->deleteById($request->input('id'));
        $this->photoActuDAO->deletePhotosFromIdActu($request->input('id'));
        return redirect('actu');
    }

    public function update(newsRequest $request)
    {
        if (!Auth::check() && !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        $actu = $this->actuDAO->getActuById($request->input('id'));
        $listphoto = $this->photoActuDAO->getPhotoById($actu->getId());
        return view('ajoutActu', compact('actu', 'listphoto'));
    }
}
