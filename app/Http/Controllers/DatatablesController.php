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
        return view('mesadeentradas');
    }

    public function anyData(){
        return DataTables::of(User::query())->make(true);
    }
}
