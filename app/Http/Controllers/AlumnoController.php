<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->tipo=='2'||auth()->user()->tipo=='3'){
            return view('alumnos.index');
        }
        return redirect('vista');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function temporal(Request $request)
    {   
        if(auth()->user()->tipo=='2'||auth()->user()->tipo=='3'){
            $datos=(object)array(
                                'nombre'=>$request->nombre,
                                'edad'=>$request->edad
                                );
            \Session::push('Registro',$datos);
            return view('alumnos.registro');
        }
        return redirect('vista');
    }

    public function create()
    {   
        if(auth()->user()->tipo=='2'||auth()->user()->tipo=='3'){
            $lista= \Session::get('Registro');
            return view('alumnos.registro',['lista'=>$lista]);
        }
        return redirect('vista');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }


    public function redirectPath(){
        if(auth()->user()->tipo=='1'){
            return view('admi.admi1');
        }
        if(auth()->user()->tipo=='2'){
            return view('admi.admi2');;
        }
        return  view('admi.admi3');;
    }
    public function redirigir(){
        if(auth()->user()->tipo=='1'){
            return view('auth.register');
        }
        return redirect('vista');
    }
    protected function crear()
    {
        return view('registro.nuevoalumno');
    }
}
