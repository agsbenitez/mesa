<?php

namespace App\Http\Controllers;

use App\Expediente;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Exp = Expediente::orderBy('fecha_alta', 'desc')->paginate(4);




        return $Exp;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'estado'=> 'required',
            'asunto'=> 'required',
            'comitente'=> 'required',
            'destinatario' => 'required',
            'fechaAlta' => 'required',
            'fechaHasta' => 'required',
            'area' => 'required',
            'presupuesto' => 'required',
            'lugar'=> 'required',
            'comentario'=> 'required',
            'tags'=> 'required',
        ]);

        $exp = $request->estado;

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
        $exp = Expediente::find($id);
        return $exp;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Exp = Expediente::findOrFail($id);
        //Formulario
        return $Exp;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$Exp = Expediente::findOrFail($id);
        //Formulario
        //$Exp
    }
}
