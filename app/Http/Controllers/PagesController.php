<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    public function inicio()
    {
        $productos = App\Producto::all();
        return view('welcome', compact('productos'));
    }
    public function detalle($id){
        $producto = App\Producto::findOrFail($id);
        return view('productos.detalle', compact('producto'));
    }

    public function crear(Request $request){ //$request recibe lo que mandamos en el formulario
        //return $request->all(); // Paa verificar en el navegador lo que se esta enviando del formulario

        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);//Se comprueba de que los campos no lleguen vacios

        $nuevoProducto = new App\Producto;
        $nuevoProducto->nombre = $request->nombre; // nombre pertenece a los name del input del formulario
        $nuevoProducto->descripcion = $request->descripcion;

        $nuevoProducto->save(); //Para guardar en base de datos

        return back()->with('mensaje', 'Producto agregado!');
    }

    public function editar($id){

        //Lo que encuentre lo pasa al objeto
        $producto = App\Producto::findOrFail($id);
        //Pasamos el objeto  a la ruta editar a travez de compact
        return view('productos.editar', compact('producto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);//Se comprueba de que los campos no lleguen vacios

        $updateProducto = App\Producto::findOrFail($id);
        $updateProducto->nombre = $request->nombre;
        $updateProducto->descripcion = $request->descripcion;

        $updateProducto->save();

        return back()->with('mensaje', 'Producto actualizado');
    }

    public function eliminar($id){

        $eliminarProducto = App\Producto::findOrFail($id);
        $eliminarProducto->delete();

        return back()->with('mensaje', 'Producto eliminado');
    }
}
