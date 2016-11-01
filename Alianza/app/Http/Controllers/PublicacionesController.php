<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionesController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrador.publicaciones');
       // return view('admin.template.main');
    }
}
