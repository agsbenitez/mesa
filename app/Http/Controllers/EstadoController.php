<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado = Estado::get();


        return $estado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /** public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->estado);
        $msg='';
        $this->validate($request,[
            'estado'=> 'required'
        ]);

        $estado = $request->estado;

        try{
            $newEstado = new Estado();
            $newEstado->estado = $estado;
            $newEstado->save();
            $msg="succes";
        } catch (\Exception $e){
            $msg=$e->getMessage();
            return new JsonResponse($msg, 500);
        }


        return $msg;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //aca tengo que poner el codigo para actualizar el estado

        $this->validate($request,[
            'estado'=> 'required'
        ]);

        $estado = Estado::find($id);

        $estado->estado = $request->get('estado');

        try{
            $estado->save();
            $msg = 'Estado Actualizado';
        } catch (QueryException $e){
            $msg=$e->getMessage();
            return new JsonResponse($msg, 500);
        }

        return $msg;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estado::find($id);

        try{
            $estado->delete();
            $msg= "Estado eliminado";
        }catch (\Exception $e){
            $msg=$e->getMessage();
            return new JsonResponse($msg, 500);
        }



        return $msg;
    }
}
