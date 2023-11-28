<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
   
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
        ]);
        
        $categoria = new Categoria();
        $categoria->nombre=$request->input('nombre');

        if ($categoria->save()){
         $mensaje = "La categoria se a creado  Exitosamente"; 
        }
        
        else{
          $mensaje = "La categoria no se a creado exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje',$mensaje);
    }
}
