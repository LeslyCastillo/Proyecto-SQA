<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $marcas=Marca::all();
        return view("marcas.index", compact("marcas"));
    }

    public function created(){
        return view('marcas.created');
    }

    public function store(Request $request){
        $marca=new marca;//modelo
        $marca->marca=$request->marca;
        $marca->save();
        return redirect()->route('marcas.index');//name de la ruta
    }

    public function find(){
        return Marca::all();
    }

    public function edit($id){
        $marca=Marca::find($id);
        return view("marcas.edit", compact("marca"));
    }

    public function updated(Request $request, $id){
        $marca=Marca::find($id);
        $marca->fill($request->all())->save();
        return redirect()->route("marcas.index");
    }
}
