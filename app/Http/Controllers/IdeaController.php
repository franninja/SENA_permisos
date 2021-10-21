<?php

namespace App\Http\Controllers;

use App\Idea;
use Illuminate\Http\Request;


class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Idea::paginate(6);
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 'descripcion' => 'required', 'archivo' => 'required|image|mimes:jpeg,png,svg,txt,pdf,doc|max:2048'
        ]);

         $idea = $request->all();
        
        if($archivo = $request->file('archivo')){
            $rutaGuardarArchivo = 'archivo/';
            $archivoIdea = date('YmdHis'). "." . $archivo->getClientOriginalExtension();
            $archivo->move($rutaGuardarArchivo, $archivoIdea);
            $idea['archivo'] = "$archivoIdea";
        }

        Idea::create($idea);
        return redirect()->route('ideas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idea $idea)
    {
        $request->validate([
            'nombre' => 'required', 'descripcion' => 'required'
        ]);

         $idea2 = $request->all();
        
        if($archivo = $request->file('archivo')){
            $rutaGuardarArchivo = 'archivo/';
            $archivoIdea = date('YmdHis'). "." . $archivo->getClientOriginalExtension();
            $archivo->move($rutaGuardarArchivo, $archivoIdea);
            $idea2['archivo'] = "$archivoIdea";
        }else{
            unset($idea2['archivo']);
        }
        $idea->update($idea2);
        return redirect()->route('ideas.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('ideas.index');

    }
}
