<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{


    /**
     * Funcion que retorna todos los clientes de la DB
     */
    public function getAllClientes()
    {
        try {
            $clientes = Cliente::all();
            return $clientes;
        } catch (\Exception $e) {
            return response()->json(['Error en la carga de los clientes Error: ' . $e], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json('Error: ' . $e, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    //! verificar que el usuario no tenga ninguna compra ni reparacion 
    public function eliminar($id)
    {
        try {
            DB::beginTransaction();
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            DB::commit();
            return response()->json(['Eliminacion Correcta'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['Eliminacion Fallida ERROR BACKEND: ' . $e], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     */
    public function actualizar(Request $request)
    {
        $idCliente = $request->id;
        return $request;
    }

    /**
     * Funcion prara la creacion de un nuevo Cliente
     */

    public function crear(Request $request)
    {
        try {
            DB::beginTransaction();
            Cliente::create($request->all());
            DB::commit();
            return response()->json('Cliente dado de alta correctamente', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Alta de cliente fallida ERROR BACKEND' . $e->getMessage(), 500);
        }
    }

    //---------------------------------------FUNCIONES PRIVADAS---------------------------------------

    /**
     * Funcion que comprueba que los valores traidos del Front sean correctos (sino los cambiara)
     */
    private function comprobarValoresOK(Request $request)
    {
        
    }
}