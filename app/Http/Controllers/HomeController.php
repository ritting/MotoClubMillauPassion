<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\newsRequest;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function redirectWelcome()
    {
        return view('welcome');
    }

    public function store(newsRequest $request)
    {

        //exemple de requete :
        $user_name = $request->input('name');
        $result = DB::table('news')->updateOrInsert(['name'=>$request->input('name')]);
    }


}
