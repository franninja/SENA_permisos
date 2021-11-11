<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Idea;
use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $challenges = Challenge::all();
        return view('ideas.create',[
            'challenges' => $challenges,
            'idea' => new Idea
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $user = auth()->user();
        $id = $user->id;
        
        $validate = $this->validate($request, [
            "name" => ["required", "string", "max:255"],
            "description" => ["required"],
        ]);


        $files = $request->file('file');
        
        $name = $request->input("name");
        $challenge_id = $request->input("challenge_id");
        $description = $request->input("description");
        
        $idea = new Idea();
        $idea->challenge_id = $challenge_id;
        $idea->user_id = $id;
        $idea->name = $name;
        $idea->description = $description;
        
        $idea->save();
        
        
        if($files){

            foreach($files as $file){
                //poner un nombre unico a la imagen subida
                $image_path_name = time().$file->getClientOriginalName();
                //guardarlo en el disco de imagenes
                Storage::disk('idea')->put($image_path_name, File::get($file));
                //seterar el image_path el nombre unico

                // para el tema de los uploads
                $uploads = new Upload(["path" => $image_path_name]);
                $idea->uploads()->save($uploads);
                // $challenge->uploads()->save();
            }
        }

        return true;
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
    public function update(Request $request, Idea $idea, $id)
    {
        // $request->validate([
        //     'nombre' => 'required', 'descripcion' => 'required'
        // ]);

        // $idea2 = $request->all();
        
        // if($archivo = $request->file('archivo')){
        //     $rutaGuardarArchivo = 'archivo/';
        //     $archivoIdea = date('YmdHis'). "." . $archivo->getClientOriginalExtension();
        //     $archivo->move($rutaGuardarArchivo, $archivoIdea);
        //     $idea2['archivo'] = "$archivoIdea";
        // }else{
        //     unset($idea2['archivo']);
        // }
        // $idea->update($idea2);
        // return redirect()->route('ideas.index');

        // aca va a ir lo que voy a actualizar

        $validate = $this->validate($request, [
            "name" => ["required", "string", "max:250"],
            "description" => ["required"],
        ]);


        $files = $request->file('archivo');

        $idea = Idea::find($id);
        $idea->name = $request->input("name");
        $idea->description = $request->input("description");

        $idea->update();

        
        if($files){

            foreach($files as $file){
                //poner un nombre unico a la imagen subida
                $image_path_name = time().$file->getClientOriginalName();
                //guardarlo en el disco de imagenes
                Storage::disk('idea')->put($image_path_name, File::get($file));
                //seterar el image_path el nombre unico

                // para el tema de los uploads
                $uploads = new Upload(["path" => $image_path_name]);
                $idea->uploads()->save($uploads);
                // $challenge->uploads()->save();
            }
        }



        return true;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idea = Idea::find($id);

        $uploads = $idea->uploads;

        foreach($uploads as $upload){
            // eliminar del storage
            Storage::disk('idea')->delete($upload->path);
            // eliminar de la db
            $upload->delete();
        }

        $idea->delete();
        return redirect()->route('ideas.index');

    }
}
