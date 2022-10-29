<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $servicios = Servicio::all();

        return view('servicios.index', compact('servicios'));
    }

    public function all()
    {
        return Servicio::where('id','!=',5)->get();
    }

    public function created()
    {
        return view('servicios.created');
    }

    public function store(Request $request)
    {
        $servicio = new Servicio;//modelo
        $servicio->servicio = strtoupper($request->servicio);
        $servicio->save();
        return redirect()->route('servicios.index');//name de la ruta
    }

    //Eliminar
    public function delete($id)
    {
        Servicio::destroy($id);

        return back()->with('servicioEliminado', 'Servicio Eliminado');
    }

    public function find()
    {
        return Servicio::all();
    }

    //editar
    public function edit($id)
    {
        $servicio = Servicio::find($id);
        return view("servicios.edit", compact("servicio"));
    }

    public function updated(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->fill($request->all())->save();
        return redirect()->route("servicios.index");
    }

//    public function inicio(){
//        return view('index');
//
//    }
    //
}
