<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return response()->json(producto::all(),200); //Mostrar todos los productos 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar datos
        $datos = $request->validate({
            'nombre' =>['required','string','max:100'],
            'descripcion' =>['nullable','string','max:255'],
            'precio' => ['required','integer','min:100'],
            'stock'=> ['required','integer','min:1'],

        });
        //guardar datos
        $producto = Producto::create($datos);
        //respuesta l cliente
        return response()->json({
            'success' =>true,
            'message' => 'producto creado exitosamente'
            }, 201);
    

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        
            return response()->json($producto,200); //mostrar un producto
          
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //validar datos
        $datos = $request->validate({
            'nombre' =>['required','string','max:100'],
            'descripcion' =>['nullable','string','max:255'],
            'precio' => ['required','integer','min:100'],
            'stock'=> ['required','integer','min:1'],





        });
        //actualizar datos
        $producto = Producto::update($datos);
        //respuesta l cliente
        return response()->json([
            'success' =>true,
            'message' => 'producto actulizado exitosamente'
            ], 200);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //eliminar datos
        $producto->delete();
        
        //respuesta l cliente
        return response()->json([
            'success' =>true,
            'message' => 'producto eliminado exitosamente'
            ], 204);




        
    }
}
