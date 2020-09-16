<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use App\DAO\PartenairesDAO;
use Illuminate\Support\Facades\Auth;

class PartenairesController extends Controller
{
    protected $partenairesDAO;

    public function __construct()
    {
        $this->partenairesDAO = new PartenairesDAO();
    }

    public function index()
    {
        $partenaires = $this->partenairesDAO->get();
        return view('partenaires', compact('partenaires'));
    }

    public function gestion(newsRequest $request)
    {
        if (!Auth::check() || !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        if (isset($_POST['publier']))
        {
            $lien_image = time() . $request->photo->extension();
            $request->file('photo')->move('img/partenaires/', $lien_image);
            if(Empty($request->input('lien')))
            {
                $lien = 'pas_de_lien';
            }
            else
            {
                $lien = $request->input('lien');
            }
            $this->partenairesDAO->insert($lien_image, $lien);
            $partenaires = $this->partenairesDAO->get();
            return view('partenaires', compact('partenaires'));
        }
        elseif (isset($_POST['supprimer']))
        {
            $this->partenairesDAO->delete($request->input('id'));
            $partenaires = $this->partenairesDAO->get();
            return view('partenaires', compact('partenaires'));
        }
    }

}
