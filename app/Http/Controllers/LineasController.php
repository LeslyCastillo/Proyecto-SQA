<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Marca;
use Illuminate\Http\Request;

class LineasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $lineas=Linea::join('marcas','marcas.id','=','lineas.marcas_id')
        ->select('marcas.marca','lineas.id', 'lineas.linea')->get();
        return view("lineas.index", compact("lineas"));
    }

    public function created(){
        $marcas=Marca::all();
        return view('lineas.created', compact("marcas"));
    }

    public function store(Request $request){
        $linea=new linea;//modelo
        $linea->linea=strtoupper($request->linea);
        $linea->marcas_id=$request->marca;
        $linea->save();
        return redirect()->route('lineas.index');//name de la ruta
    }

    public function find(){
        return Linea::all();
    }

    public function edit($id){
        $linea=Linea::find($id);
        $marcas=Marca::all();
        return view("lineas.edit", compact("linea", "marcas"));
    }

    public function updated(Request $request, $id){
        $linea=Linea::find($id);
        $linea->fill($request->all())->save();
        return redirect()->route("lineas");
    }
}
