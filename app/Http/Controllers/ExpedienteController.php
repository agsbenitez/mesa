<?php

namespace App\Http\Controllers;

use App\Expediente;
use Illuminate\Support\Facades\Validator;
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
        dd($json['expediente'],['asunto']);


        $validator = Validator::make($json['expediente'],[
            'asunto' => 'required',
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

        if ($validator->fails()){
            return new JsonResponse($validator->errors()->all(), 400);
        }

        /*$this->validate($json,[
            'asunto' => 'required',
            'comitente'=> 'required',
            'destinatario' => 'required',
            'fechaAlta' => 'required',
            'fechaHasta' => 'required',
            'area' => 'required',
            'presupuesto' => 'required',
            'lugar'=> 'required',
            'comentario'=> 'required',
            'tags'=> 'required',
        ]);*/

        $asunto = $request->newExpediente->asunto;
        $comit = $request->newExpediente->comitente;
        $destinatario = $request->newExpediente->destinatario;
        $fechaA = $request->newExpediente->fechaAlta;
        $fechaH = $request->newExpediente->fechaHasta;
        $area = $request->newExpediente->area;
        $presupuesto = $request->newExpediente->presupuesto;
        $lugar = $request->newExpediente->lugar;
        $tags = $request->newExpediente->tags;

        try{
            $newExp = new Expediente();
            $newExp->comitente = $comit;
            $newExp->destinatario = $destinatario;
            $newExp->fecha_alta = $fechaA;
            $newExp->fecha_resolucion=$fechaH;
            $newExp->area=$area;
            $newExp->asunto=$asunto;
            $newExp->presupuesto=$presupuesto;
            $newExp->lugar=$lugar;
            $newExp->save();
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
