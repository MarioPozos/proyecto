<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Universidad;
use DataTables;
class UniversidadController extends Controller
{
    public function index(){
        $unis = Universidad::all();
        return view ('universidad.universidad', compact('unis'));
    }
    public function store(Request $request){
    
        $uni = new Universidad;
        $uni->nombre = $request->input('universidad');
        $uni->save();
    }
    public function datosUni(){
    
        $uni =Universidad::all();
        return Datatables::of($uni)->make(true);
        /*->addColomn('acción', function($uni){
            '<a onclick="showData('.$uni->id.')" class="btn btn-sm btn-success">Ver</a>'.' '.
            '<a onclick="editData('.$uni->id.')" class="btn btn-sm btn-info">Editar</a>'.' '.
            '<a onclick="deleteData('.$uni->id.')" class="btn btn-sm btn-danger">Eliminar</a>';
        })*/
    }
}
