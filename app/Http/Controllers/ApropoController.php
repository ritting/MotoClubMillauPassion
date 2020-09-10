<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
use App\DAO\PartenairesDAO;
use Illuminate\Support\Facades\Auth;

class ApropoController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('apropos');
    }

}
