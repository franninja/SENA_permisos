<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //mostrar la vista
    // public function create(){
    //     return View('idea.create');

    // }
    public function create(){
        return View('idea.prueba');

    }
}
