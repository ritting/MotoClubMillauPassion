<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use App\DAO\ReglementDAO;
use Illuminate\Support\Facades\Auth;

class ReglementController extends Controller
{
    protected $reglementDAO;

    public function __construct()
    {
        $this->reglementDAO = new ReglementDAO();
    }

    public function index()
    {
        $reglements = $this->reglementDAO->get();
        return view('reglement', compact('reglements'));
    }

    public function gestion(newsRequest $request)
    {
        if (!Auth::check() || !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        if (isset($_POST['publier']))
        {
            var_dump($request->input('id'));
            $this->reglementDAO->insert($request);
            $reglements = $this->reglementDAO->get();
            return view('reglement', compact('reglements'));
        }
        elseif (isset($_POST['supprimer']))
        {
            $this->reglementDAO->delete($request->input('id'));
            $reglements = $this->reglementDAO->get();
            return view('reglement', compact('reglements'));
        }
        elseif (isset($_POST['publier_photo']))
        {
            $name = time() . $request->photo->extension();
            $request->file('photo')->move('img/reglement/', $name);
            $this->reglementDAO->insertPhoto($name);
            $reglements = $this->reglementDAO->get();
            return view('reglement', compact('reglements'));
        }
    }

}
