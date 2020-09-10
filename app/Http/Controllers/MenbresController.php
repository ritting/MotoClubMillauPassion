<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use Illuminate\Support\Facades\Auth;
use App\DAO\MenbresDAO;

class MenbresController extends Controller
{
    protected $MenbresDAO;

    public function __construct()
    {
        $this->MenbresDAO = new MenbresDAO();
    }

    public function index()
    {
        if (Auth::check() && Auth::User()->verifie === 1)
        {
            $menbres = $this->MenbresDAO->getAllMenbres();
            return view('menbres', compact('menbres'));
        }
        else
        {
            return redirect()->to('/');
        }

    }

    public function gestion(newsRequest $request)
    {
        if (!Auth::check() || !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        if (isset($_POST['desaccepter']))
        {
            $this->MenbresDAO->MenbreDesaccepter($request);
        }
        elseif (isset($_POST['accepter']))
        {
            $this->MenbresDAO->MenbreAccepter($request);
        }
        elseif (isset($_POST['desadmin']))
        {
            $this->MenbresDAO->MenbreDesadmin($request);
        }
        elseif (isset($_POST['admin']))
        {
            $this->MenbresDAO->MenbreAdmin($request);
        }
        elseif (isset($_POST['supprimer']))
        {
            $this->MenbresDAO->deleteById($request);
        }
        else
            {
            return redirect()->to('/');
        }
        $menbres = $this->MenbresDAO->getAllMenbres();
        return view('menbres', compact('menbres'));
    }

}
