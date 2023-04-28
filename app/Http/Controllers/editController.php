<?php

namespace App\Http\Controllers;

use App\Models\Bibliografia;
use App\Models\Farmacos;
use App\Models\Grupos;
use App\Models\Interacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class editController extends Controller
{
    public function edit_farmaco($id){
        return view('edit.farmaco', compact('id'));
    }

    public function edit_grupo($id){
        return view('edit.grupo', compact('id'));
    }

    public function edit_bibliografia($id){
        return view('edit.bibliografia', compact('id'));
    }

    public function edit_interaccion($id, $id_int){
        return view('edit.interaccion', compact('id', 'id_int'));
    }

    public function update_farmaco(Request $request){
        $id = $request -> id;
        $farmaco = Farmacos::find($id);
        $farmaco -> farmaco = $request -> nombre;
        $farmaco -> mecanismo = $request -> mecanismo;
        if($request->hasFile('imagen_url')){

            $destino = 'storage/imgFarmacos/'.$farmaco -> imagen_url;
            if(File::exists($destino)){
                File::delete($destino);
            }

            $imagen = $request -> file('imagen_url');
            $ext = $imagen -> getClientOriginalExtension();
            $name = Str::slug($request -> nombre).".".$ext;
            $ruta = public_path("storage/imgFarmacos/");
            $imagen -> move($ruta, $name);
            $farmaco -> imagen_url = $name;
        }
        $farmaco -> efecto = $request -> efecto;
        $farmaco -> id_grupo = $request -> grupo;
        if(isset($request -> mostrar)){
            $farmaco -> estatus =  $request -> mostrar;
            }else{
                $farmaco -> estatus = 0;
            }
        $farmaco -> update();
        return view('home.home');
    }

    public function update_grupo(Request $request){
        $id = $request -> id;
        $grupo = Grupos::find($id);
        $grupo -> grupo = $request -> grupo;
        $grupo -> subgrupo = $request -> subgrupo;
        
        if(isset($request -> mostrar)){
            $grupo -> estatus =  $request -> mostrar;
            }else{
                $grupo -> estatus = 0;
            }
        $grupo -> update();
        return view('home.grupos');
    }

    public function update_bibliografia(Request $request){
        $id = $request -> id;
        $bibliografia = Bibliografia::find($id);
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
        $bibliografia -> update();
        return view('home.bibliografia');
    }

    public function update_interaccion(Request $request){
        $id = $request -> farmaco;
        $id2 = $request -> inter;
        $interaccion = Interacciones::find($id2);
        $interaccion -> recomendacion = $request -> recomendacion;
        $interaccion -> update();
        return view('forms.interaccion', compact('id'));
    }
}
