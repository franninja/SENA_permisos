<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Challenge;
use App\Upload;
use App\Area;
use Psy\VarDumper\Dumper;

class ChallengeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // sacar los desafios
        $challenges = Challenge::all();
        // $areas = Area::all();
        return view("challenge.index", [
            "challenges" => $challenges
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::All();
        return view('challenge.create', [
            'challenge' => new Challenge,
            'areas' => $areas,
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
            "privacity" => ["required", "string"],
            "description" => ["required"],
            "status" => ["string"],
        ]);


        $files = $request->file('file');

        $name = $request->input("name");
        $privacity = $request->input("privacity");
        $description = $request->input("description");
        $status = $request->input("status");

        $challenge = new Challenge();
        $challenge->area_id = $privacity;
        $challenge->user_id = $id;
        $challenge->name = $name;
        $challenge->description = $description;
        $challenge->status = $status;

        $challenge->save();

        
        if($files){

            foreach($files as $file){
                //poner un nombre unico a la imagen subida
                $image_path_name = time().$file->getClientOriginalName();
                //guardarlo en el disco de imagenes
                Storage::disk('challenge')->put($image_path_name, File::get($file));
                //seterar el image_path el nombre unico

                // para el tema de los uploads
                $uploads = new Upload(["path" => $image_path_name]);
                $challenge->uploads()->save($uploads);
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
    public function edit($id)
    {
        $challenge = Challenge::find($id);
        // dump($challenge->uploads);
        // die();
        $areas = Area::all();
        $uploads = Upload::where('uploadable_id', $id)->get();
        return view('challenge.edit', [
            'challenge' => $challenge,
            'areas' => $areas,
            'uploads' => $uploads,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            "name" => ["required", "string", "max:255"],
            "privacity" => ["required", "string"],
            "description" => ["required"],
            "status" => ["string"],
        ]);


        $files = $request->file('file');

        $challenge = Challenge::find($id);
        $challenge->name = $request->input("name");
        $challenge->area_id = $request->input("privacity");
        $challenge->description = $request->input("description");
        $challenge->status = $request->input("status");

        $challenge->update();

        
        if($files){

            foreach($files as $file){
                //poner un nombre unico a la imagen subida
                $image_path_name = time().$file->getClientOriginalName();
                //guardarlo en el disco de imagenes
                Storage::disk('challenge')->put($image_path_name, File::get($file));
                //seterar el image_path el nombre unico

                // para el tema de los uploads
                $uploads = new Upload(["path" => $image_path_name]);
                $challenge->uploads()->save($uploads);
                // $challenge->uploads()->save();
            }
        }



        return true;
    }

    public function changeStatus($id){
        $challenge = Challenge::find($id);
        if($challenge->status == 'activo'){
            $challenge->status = 'inactivo';
        }else{
            $challenge->status = 'activo';
        }
        $challenge->update();
        return redirect()->route('challenge.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $challenge = Challenge::find($id);

        $uploads = $challenge->uploads;

        foreach($uploads as $upload){
            // eliminar del storage
            Storage::disk('challenge')->delete($upload->path);
            // eliminar de la db
            $upload->delete();
        }

        $challenge->delete();

        return redirect()->route("challenge.index")->with([
    		'message' => 'Desafio eliminado correctamente'
    	]);
    }

    
}
