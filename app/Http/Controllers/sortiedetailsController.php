<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use App\DAO\SortiesDAO;
use App\DAO\PhotoSortiesDAO;
use App\DAO\BenevolesDAO;
use App\DAO\ParticipantsDAO;
use Illuminate\Support\Facades\Auth;

class SortiedetailsController extends Controller
{
    protected $sortiesDAO;
    protected $photosortiesDAO;
    protected $benevolesDAO;
    protected $participantsDAO;

    public function __construct()
    {
        $this->sortiesDAO = new SortiesDAO();
        $this->photosortiesDAO = new PhotoSortiesDAO();
        $this->benevolesDAO = new BenevolesDAO();
        $this->participantsDAO = new ParticipantsDAO();
    }

    public function getSortieById($id)
    {
        $sortie = $this->sortiesDAO->getsortieById($id);
        $photos = $this->photosortiesDAO->getPhotosById($id);
        if(Auth::check() &&Auth::user()->admin === 1)
        {
            $benevole = $this->sortiesDAO->getBenevolesFromIdSortie($id);
            $participant = $this->sortiesDAO->getParticipantsFromIdSortie($id);
        }
        elseif (Auth::check() && Auth::user()->verifie === 1)
        {
            $benevoles = $this->benevolesDAO->getBenevoles($id, Auth::user()->id);
            $participants = $this->participantsDAO->getParticipants($id, Auth::user()->id);
            $benevole = $benevoles->first();
            $participant = $participants->first();
        }
//        , compact('photos'), compact('benevole'), compact('participants'));
        return view('sortiedetails', compact('sortie', 'photos', 'benevole', 'participant'));}

    public function deletePhoto(newsRequest $request)
    {
        if (!Auth::check() && !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        $this->photosortiesDAO->deletePhotosFromId($request->input('id'));
        $sortie = $this->sortiesDAO->getSortieById($request->input('id_sortie'));
        $photos = $this->photosortiesDAO->getPhotosById($sortie->id);
        return view('sortiedetails', compact('sortie'), compact('photos'));
    }

    public function gestion(newsRequest $request)
    {
        if (isset($_POST['participation_in']))
        {
            $this->participantsDAO->setParticipants($request);
        }
        elseif(isset($_POST['participation_out']))
        {
            $this->participantsDAO->desetParticipants($request);
        }
        elseif(isset($_POST['benevole_in']))
        {
            $this->benevolesDAO->setBenevole($request);
        }
        elseif(isset($_POST['benevole_out']))
        {
            $this->benevolesDAO->desetBenevole($request);
        }
        return redirect('sorties');
    }
}
