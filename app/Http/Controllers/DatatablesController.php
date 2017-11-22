<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\User;

class DatatablesController extends Controller
{
    public function index(){
        return view('mesadeentradas');

    }
    public function getIndex(){
        //return view('mesadeentradas');
        $usuarios = User::select(['id','name', 'created_at', 'updated_at']);
        dd($usuarios);
        return Datatables::of($usuarios)
            ->make(true);
    }

    public function anyData(Request $request){
        dd($request);
        $a = DataTables::of(User::query())->make(true);
        return view('vista')
            ->with('Data', $a);
    }

}
