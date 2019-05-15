<?php

namespace App\Http\Controllers;
 
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Universidad;
use DataTables;
class UniversidadController extends Controller
{
    public function index(){
        $unis = Universidad::all();
        return view ('universidad.universidad', compact('unis'));
    }
    protected function create(array $data)
    {
        return Universidad::create([
            'nombre' => $data['nombre'],
        ]);
    }
    public function store(Request $request){
        //dd($request->all());        
        $input = [
            'nombre'   => $request->input('nombre')
             ];
        $rules = [
                    'nombre' => 'required|string|max:100|unique:universidads'
                    ];
        $messages = [
                        'unique' => 'La universidad debe ser registrada una sola vez'
                        ];
        $validator = Validator::make($input, $rules, $messages);
        if ( $validator->fails()){
            $errors=$validator->errors();
            return new JsonResponse($errors,422);
        }
        $this->create($request->all());
        
        ///$this->guard()->login($user);
        return 'Registro de universidad exitoso';
        /*
        $uni = new Universidad;
        $uni->nombre = $request->input('universidad');
        $uni->save();*/
    }
    
    public function editar(Request $request){
        $x=Universidad::find($request->input('universidad'));

        $input = [
            'nombre'   => $request->input('universidad')
             ];
        $rules = [
                    'nombre' => 'required|string|max:100|unique:universidads,nombre'
                    ];
        $messages = [
                        'unique' => 'La universidad ya se ha registrada anteriormente'
                        ];
        $validator = Validator::make($input, $rules, $messages);
        //$name= Universidad::select('nombre')->where('id', '=', $request->get('uni_id'))->first();
        //Universidad::select('nombre')->where('id', '=', $request->get('uni_id'))->first();
        if ( $validator->fails()){
            $errors=$validator->errors();
            return new JsonResponse($errors,422);
        }

        $uni = new Universidad;
        $uni = Universidad::find($request->get('uni_id'));
        $uni->nombre = $request->input('universidad');
        $uni->save();
        return 'Actualización de universidad exitoso';
    }
    public function borrar(Request $request){
    
        
        $uni = Universidad::find($request->input('id'));
        if($uni->delete()){
            echo 'Universidad Borrada';
        }else{
            echo 'No se pudo borrar la Universidad';
        }
        
    }
    public function datosUni(){
    
        $uni =Universidad::all();
        return Datatables::of($uni)->make(true);
        
    }
    public function editarUni(Request $request){
    
        $id = $request->input('id');
        $uni = Universidad::find($id);
        $output = array(
            'nombre' => $uni->nombre 
        );
        echo json_encode($output);
        
    }

}
