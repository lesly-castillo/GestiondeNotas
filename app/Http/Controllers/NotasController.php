<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Nota;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class NotasController extends Controller
{
    public function index()
    {
     
        $nota = Nota::paginate(10); 
        return view('Notas.NIndex')->with('notas',$nota);
                 
    }

    public function create() 
    {
        $categorias = Categoria::all();
        return view('Notas.NCreate', compact('categorias'));
    }

    public function store(Request $request) 
   
    {
        $request->validate([ 
        'titulo'=>'required|regex:/[A-Z][a-z]+/i', //cualquier valor
        'contenido'=>'required|regex:/[A-Z][a-z]+/i',
        'categoria'=>'required',  
        'fecha'=>'required|date', // fecha
        'etiqueta'=>'required',
        'color'=>'required',


        ]);

          
        $nota = new Nota(); 
        $nota->titulo = $request->input('titulo');
        $nota->fecha = $request->input('fecha');
        $nota->etiqueta=$request->input('etiqueta');
        $nota->color=$request->input('color');
        $categoria = Categoria::find($request->input('categoria'));


        if (!$categoria) {
            return redirect()->route('nota.crear')->with('error', 'La categoría no existe');
        }

        $nota->categoria = $categoria->nombre;
        $nota->contenido = $request->input('contenido');

        if ($nota->save()) {
            $mensaje = "La Nota se a creado  exitosamente"; 
        } else {
            $mensaje = "La Nota no se  a creado  exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje', $mensaje);
    }


    public function show(string $id)
    {
      
        $nota = Nota::findOrfail($id);
        return view('Notas.NShow' , compact('nota'));
        
    }

    public function edit(string $id)
    {
        $nota = Nota::findOrfail($id);
        $categorias = Categoria::all();

        return view('Notas.NEdit', compact('categorias'))->with('notas',$nota);
    }

    public function update(Request $request, string $id)
    {
        $nota = Nota::findOrfail($id);
        
        $request->validate([
            'titulo'=>'required|regex:/[A-Z][a-z]+/i',
            'contenido'=>'required|regex:/[A-Z][a-z]+/i',
            'categoria'=>'required',
            'fecha'=>'required|date',
            'etiqueta'=>'required',
            'color'=>'required',
        ]);

        $nota->titulo = $request->input('titulo');
        $nota->fecha = $request->input('fecha');
        $nota->etiqueta=$request->input('etiqueta');
        $nota->color=$request->input('color');
        $categoria = Categoria::find($request->input('categoria'));
        if (!$categoria) {
            return redirect()->route('nota.editar')->with('error', 'La categoría no existe');
        }

        $nota->categoria = $categoria->nombre;
        $nota->contenido = $request->input('contenido');

        if ($nota->save()) {
            $mensaje = "La Nota se a creado exitosamente"; 
        } else {
            $mensaje = "La Nota no se a creado exitosamente"; 
        }

        return redirect()->route('nota.index')->with('mensaje', $mensaje);
    }

    public function destroy(string $id)
    {
        $borrados = Nota::destroy($id);
    
        if ($borrados > 0){
            $mensaje = "La Nota se a  eliminado exitosamente"; 
           }
           
           else{
             $mensaje = "La Nota no se a  elimino exitosamente"; 
           }
   
           return redirect()->route('nota.index')->with('mensaje',$mensaje);
    }
}