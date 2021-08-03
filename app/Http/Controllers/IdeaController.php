<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //mostrar la vista
    public function create(){
        return View('idea.create');

    }
}
