<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use App\DAO\PhotoActuDAO;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{
    protected $PhotoActuDAO;

    public function __construct()
    {
        $this->PhotoActuDAO = new PhotoActuDAO();
    }

    public function index()
    {
        $photos = $this->PhotoActuDAO->getPhotos();
        return view('photos', compact('photos'));
    }

}
