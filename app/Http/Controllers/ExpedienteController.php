<?php

namespace App\Http\Controllers;

use App\Expediente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
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
        //dd($request->newExpediente);
        $msg='';
        $json = $request->json()->all();


        $validator = Validator::make($json['expediente'],[
            'asunto' => 'required',
            'comitente'=> 'required',
            'destinatario' => 'required',
            'fechaAlta' => 'required',
            'fechaHasta' => 'required',
            'area' => 'required',
            'presupuesto' => 'required',
            'lugar'=> 'required',

        ]);

        if ($validator->fails()){
            //$msg=$e->getMessage();
            return new JsonResponse($validator->errors()->all(), 400);
            //return new JsonResponse($msg, 400);
        }


        $asunto = $json['expediente']['asunto'];
        $comit = $json['expediente']['comitente'];
        $destinatario = $json['expediente']['destinatario'];
        $fechaA = $json['expediente']['fechaAlta'];
        $fechaH = $json['expediente']['fechaHasta'];
        $area = $json['expediente']['area'];
        $estado = $json['expediente']['estado'];
        $presupuesto = $json['expediente']['presupuesto'];
        $lugar = $json['expediente']['lugar'];
        $tags = $json['expediente']['tags'];

        try{
            $newExp = new Expediente();
            $newExp->comitente = $comit;
            $newExp->destinatario = $destinatario;
            $newExp->fecha_alta = $fechaA;
            $newExp->fecha_resolucion=$fechaH;
            $newExp->area=$area;
            $newExp->estado=$estado;
            $newExp->asunto=$asunto;
            $newExp->presupuesto=$presupuesto;
            $newExp->lugar=$lugar;
            $newExp->save();
            $msg="succes";
        } catch (QueryException $e){
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
