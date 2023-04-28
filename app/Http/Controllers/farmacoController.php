<?php

namespace App\Http\Controllers;

use App\Models\Bibliografia;
use App\Models\Farmacos;
use App\Models\Grupos;
use App\Models\Interacciones;
use App\Models\Relaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class farmacoController extends Controller
{
    public function view_farmaco(){
        return view('home.home');
    }

    public function view_grupo(){
        return view('home.grupos');
    }

    public function view_bibliografia(){
        return view('home.bibliografia');
    }

    //formularios
    public function view_farmacos(){
        return view('forms.farmaco');
    }

    public function view_grupos(){
        return view('forms.grupo');
    }

    public function view_bibliografias(){
        return view('forms.bibliografia');
    }

    public function view_interaccion($id){
        return view('forms.interaccion', compact('id'));
    }

    public function view_relaciones($id){
        return view('forms.relacion', compact('id'));
    }

    public function store_farmaco(Request $request){
        $farmaco = new Farmacos();
        $farmaco -> farmaco = $request -> nombre;
        $farmaco -> mecanismo = $request -> mecanismo;

            $imagen = $request -> file("imagen_url");
            $name = Str::slug($request -> nombre).".".$imagen -> getClientOriginalExtension();
            $ruta = public_path("storage/imgFarmacos/");
            $imagen -> move($ruta, $name);
            $farmaco -> imagen_url = $name;

        $farmaco -> efecto = $request -> efecto;
        $farmaco -> id_grupo = $request -> grupo;
        if(isset($request -> mostrar)){
        $farmaco -> estatus =  $request -> mostrar;
        }else{
            $farmaco -> estatus = 0;
        }
        $farmaco -> save();
        return view('forms.farmaco');
    }

    public function store_grupo(Request $request){
        $grupo = new Grupos();
        $grupo -> grupo = $request -> grupo;
        $grupo -> subgrupo = $request -> subgrupo;
        
        if(isset($request -> mostrar)){
            $grupo -> estatus =  $request -> mostrar;
        }else{
            $grupo -> estatus = 0;
        }
        $grupo -> save();
        return view('forms.grupo');
    }

    public function store_bibliografia(Request $request){
        $bibliografia = new Bibliografia();
        $bibliografia -> titulo = $request -> titulo;
        $bibliografia -> descripcion = $request -> descripcion;
        $bibliografia -> autor = $request -> autor;
        $bibliografia -> anio = $request -> anio;
        $bibliografia -> editorial = $request -> editorial;
        if(isset($request -> mostrar)){
            $bibliografia -> estatus =  $request -> mostrar;
        }else{
            $bibliografia -> estatus = 0;
        }
        $bibliografia -> save();
        return view('forms.bibliografia');
    }

    public function store_interaccion(Request $request){
        $interaccion = new Interacciones();
        $interaccion -> id_farmaco = $request -> farmaco;
        $id = $request -> farmaco;
        $interaccion -> recomendacion = $request -> recomendacion;
        if(isset($request -> mostrar)){
            $interaccion -> estatus =  $request -> mostrar;
        }else{
            $interaccion -> estatus = 0;
        }
        $interaccion -> save();
        return view('forms.interaccion', compact('id'));
    }

    public function store_relacion(Request $request){
        $relacion = new Relaciones();
        $relacion -> id_farmaco = $request -> farmaco;
        $id = $request -> farmaco;
        $relacion -> id_bibliografia = $request -> bibliografia;
        $relacion -> save();
        return view('forms.relacion', compact('id'));
    }

    public function delete_farmaco($id){
        $farmaco = Farmacos::find($id);
        $farmaco -> delete();
        return view('home.home');
    }

    public function delete_interaccion($id, $id_inter){
        $interaccion = Interacciones::find($id_inter);
        $interaccion -> delete();
        return view('forms.interaccion', compact('id'));
    }

    public function delete_grupo($id){
        $grupo = Grupos::find($id);
        $grupo -> delete();
        return view('home.grupos');
    }

    public function delete_bibliografia($id){
        $bibliografia = Bibliografia::find($id);
        $bibliografia -> delete();
        return view('home.bibliografia');
    }

    public function delete_relacion($id, $id_rel){
        $relacion = Relaciones::find($id_rel);
        $relacion -> delete();
        return view('forms.relacion', compact('id'));
    }
}
