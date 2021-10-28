<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreasController extends Controller
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
        $areas = Area::all();
        return view('area.index', [
            "areas" => $areas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = new Area();
        return view("area.create")->with(["area" => $area]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validar campos
        $validate = $this->validate($request, [
            "name" => ["required", "string", "max:255"],
            "description" => ["required"],
        ]);
        // crear las variables
        $name = $request->input("name");
        $description = $request->input("description");

        $area = new Area();
        $area->name = $name;
        $area->description = $description;

        $area->save();

        return redirect()->route("area.index")->with([
    		'message' => 'Area creada correctamente'
    	]);

        // echo('<pre>');
        //     dump($request);
        // echo('</pre>');
        // die();
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
        $area = Area::find($id);
        return view("area.edit", [
            "area" => $area
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validar campos
        $validate = $this->validate($request, [
            "name" => ["required", "string", "max:255"],
            "description" => ["required"],
        ]);
        // crear las variables
        $name = $request->input("name");
        $description = $request->input("description");

        $area = Area::find($id);
        $area->name = $name;
        $area->description = $description;

        $area->update();

        return redirect()->route("area.index")->with([
    		'message' => 'Area Actualizada correctamente'
    	]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();

        return redirect()->route("area.index")->with([
            "message" => "Area eliminada exitosamente"
        ]);
    }
}
