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
    public function auxiliar(Request $request)
    {   
        $datos=(object)array(
            'univeridad'=>$request->universidad           
            );
    \Session::push('Escolares',$datos);
    }
    public function temporal(Request $request)
    {   
        if(auth()->user()->tipo=='2'||auth()->user()->tipo=='3'){
            $datos=(object)array(
                                'nombre'=>$request->nombre,
                                'app'=>$request->app,
                                'apm'=>$request->apm,
                                'tel'=>$request->tel,
                                'correo'=>$request->correo,
                                'curp'=>$request->curp,
                                'inicio'=>$request->inicio,
                                'termino'=>$request->termino,
                                'codigo'=>$request->codigo,
                                'uni'=>$request->uni,
                                'facu'=>$request->facu,
                                'carrera'=>$request->carrera,
                                'matri'=>$request->matri,
                                'periodo'=>$request->periodo,
                                'genera'=>$request->genera,
                                'folio'=>$request->folio,
                                'documen'=>$request->documen,
                                'activida'=>$request->activida,
                                'comuni'=>$request->comuni
                                );
            \Session::push('Registro',$datos);
            return $this->create();
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
        /*
        $lista= \Session::get('Registro');
        foreach($lista as $listaSesion){
            $datosAlumno=new Alumno;
            $datosAlumno->nombre=$listaSesion->nombre;
            $datosAlumno->edad=$listaSesion->edad;
            $datosAlumno->save();
        }
        
        return view('alumnos.index');
        */
        \Session::forget('Registro');
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
