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

class SortiesController extends Controller
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

    public function index()
    {
        $sorties = $this->sortiesDAO->getAllsorties();
        foreach ($sorties as $sortie)
        {
            $sortie->photo = $this->photosortiesDAO->getRandomPhoto($sortie->id);
        }
        return view('sorties', compact('sorties'));
    }

    public function getSortieById($id)
    {
        $sortie = $this->sortiesDAO->getsortieById($id);
        $photos = $this->photosortiesDAO->getPhotosById($id);
        return view('sortiedetails', compact('sortie'), compact('photos'));
    }

    public function getAjoutSortiesView()
    {
        return view('ajoutSortie');
    }

    public function insert(newsRequest $request)
    {
        if(isset($_POST['ajouter']))
        {
            $id = $this->sortiesDAO->insertSortie($request);
        }elseif(isset($_POST['modifier']))
        {
            $id = $request->input('id');
            $this->sortiesDAO->updateSortie($request);
        }
        //add pictures
        if(isset($request->photo0)){
            usleep(850000);
            $name = time() . $request->photo0->extension();
            $this->photosortiesDAO->insertPhoto($id, $name);
            $request->file('photo0')->move('img/sorties/', $name);
        }
        if(isset($request->photo1)){
            usleep(850000);
            $name = time() . $request->photo1->extension();
            $this->photosortiesDAO->insertPhoto($id, $name);
            $request->file('photo1')->move('img/sorties/', $name);
        }
        if(isset($request->photo2)){
            usleep(850000);
            $name = time() . $request->photo2->extension();
            $this->photosortiesDAO->insertPhoto($id, $name);
            $request->file('photo2')->move('img/sorties/', $name);
        }
        if(isset($request->photo3)){
            usleep(850000);
            $name = time() . $request->photo3->extension();
            $this->photosortiesDAO->insertPhoto($id, $name);
            $request->file('photo3')->move('img/sorties/', $name);
        }
        return redirect('sorties');
    }

    public function delete(newsRequest $request)
    {
        if (!Auth::check() && !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        $this->sortiesDAO->deleteById($request->input('id'));
        $this->photosortiesDAO->deletePhotosFromIdSorties($request->input('id'));
        $this->benevolesDAO->deleteSortie($request->input('id'));
        $this->participantsDAO->deleteSortie($request->input('id'));
        return redirect('sorties');
    }

    //here the update function is to launch the process with information to update and the view to do it, the update in the database is in the insert function(minors changes between update and insert)
    public function update(newsRequest $request)
    {
        if (!Auth::check() && !(Auth::User()->admin === 1))
        {
            return redirect()->to('/');
        }
        $sortie = $this->sortiesDAO->getSortieById($request->input('id'));
        $listphoto = $this->photosortiesDAO->getPhotosById($sortie->id);
        return view('ajoutSortie', compact('sortie', 'listphoto'));
    }

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
}
