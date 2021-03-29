<?php

namespace App\Http\Controllers;

use App\Models\Falta;
use App\Models\Movil;
use App\Models\Parada;
use App\Models\Permiso;
use App\Models\Usuario;
use Illuminate\Http\Request;

class MovilController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'numeroplaca' => 'required|string|max:7|unique:movil',
            'color' => 'required|string|max:20',
            'marca' => 'required|string|max:20',
            'modelo' => 'required|string|max:20',
            'anho' => 'required|string|max:4',
            'tipo' => 'required|string|max:10',
            'parada_id' => 'required|numeric',
            'chofer_ci' => 'required|numeric'
        ];
        $mensajes = [
            'numeroplaca.required' => 'El numero de placa es requerido',
            'numeroplaca.string' => 'El numero de placa debe ser un texto',
            'numeroplaca.max' => 'El numero de placa es demasiado largo',
            'numeroplaca.unique' => 'El numero de placa ya existe',
            'color.required' => 'El color es requerido',
            'color.string' => 'El color debe ser un texto',
            'color.max' => 'El color es demasiado largo',
            'marca.required' => 'La marca es requerido',
            'marca.string' => 'La marca debe ser un texto',
            'marca.max' => 'La marca es demasiado largo',
            'modelo.required' => 'El modelo es requerido',
            'modelo.string' => 'El modelo debe ser un texto',
            'modelo.max' => 'El modelo es demasiado largo',
            'anho.required' => 'El año es requerido',
            'anho.string' => 'El año debe ser un texto',
            'anho.max' => 'El año es invalido',
            'tipo.required' => 'El tipo es requerido',
            'tipo.string' => 'El tipo debe ser un texto',
            'tipo.max' => 'El tipo es demasiado largo',
            'parada_id.required' => 'El ID de la parada es requerida',
            'parada_id.numeric' => 'El ID de la parada debe contener solo numeros',
            'chofer_ci.required' => 'El CI del chofer es requerido',
            'chofer_ci.numeric' => 'El CI del chofer debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        $movil = Movil::create([
            'numeroplaca' => $request->numeroplaca,
            'color' => $request->color,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'anho' => $request->anho,
            'tipo' => $request->tipo,
            'estado' => 'Disponible',
            'parada_id' => $request->parada_id,
            'chofer_ci' => $request->chofer_ci
        ]);
        return response()->json($movil);
    }

    public function update($numeroplaca, Request $request) {
        $campos=[
            'color' => 'required|string|max:20',
            'marca' => 'required|string|max:20',
            'modelo' => 'required|string|max:20',
            'anho' => 'required|string|max:4',
            'tipo' => 'required|string|max:10',
            'parada_id' => 'required|numeric',
            'chofer_ci' => 'required|numeric'
        ];
        $mensajes = [
            'color.required' => 'El color es requerido',
            'color.string' => 'El color debe ser un texto',
            'color.max' => 'El color es demasiado largo',
            'marca.required' => 'La marca es requerido',
            'marca.string' => 'La marca debe ser un texto',
            'marca.max' => 'La marca es demasiado largo',
            'modelo.required' => 'El modelo es requerido',
            'modelo.string' => 'El modelo debe ser un texto',
            'modelo.max' => 'El modelo es demasiado largo',
            'anho.required' => 'El año es requerido',
            'anho.string' => 'El año debe ser un texto',
            'anho.max' => 'El año es invalido',
            'tipo.required' => 'El tipo es requerido',
            'tipo.string' => 'El tipo debe ser un texto',
            'tipo.max' => 'El tipo es demasiado largo',
            'parada_id.required' => 'El ID de la parada es requerida',
            'parada_id.numeric' => 'El ID de la parada debe contener solo numeros',
            'chofer_ci.required' => 'El CI del chofer es requerido',
            'chofer_ci.numeric' => 'El CI del chofer debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        Movil::where('numeroplaca', $numeroplaca)
            ->update([
                'color' => $request->color,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'anho' => $request->anho,
                'tipo' => $request->tipo,
                'parada_id' => $request->parada_id,
                'chofer_ci' => $request->chofer_ci
            ]);
        $movil = Movil::find($numeroplaca);
        return response()->json($movil);
    }

    public function destroy($numeroplaca) {
        $movil = Movil::find($numeroplaca);
        $movil->delete();
        return response()->json($movil);
    }

    public function index() {
        $movil = Movil::addSelect([
            'nombreparada' => Parada::select('nombre')->whereColumn('id', 'movil.parada_id'),
            'direccionparada' => Parada::select('direccion')->whereColumn('id', 'movil.parada_id'),
            'nombrechofer' => Usuario::select('nombre')->whereColumn('ci', 'movil.chofer_ci'),
            'apellidochofer' => Usuario::select('apellido')->whereColumn('ci', 'movil.chofer_ci')
        ])->get();
        $parada = Parada::all();
        $chofer = Usuario::where('tipo', 'chofer')->get();
        $data = array(
            'movil' => $movil,
            'parada' => $parada,
            'chofer' => $chofer
        );
        return view('v2.nuevo-movil', ['data' => $data]);
    }

    public function choferIndex(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $estado = Movil::join('usuario as uchofer', 'movil.chofer_ci', '=', 'uchofer.ci')
            ->join('viaje', 'movil.numeroplaca', '=', 'viaje.movil_numeroplaca')
            ->join('usuario as ucliente', 'viaje.cliente_ci', '=', 'ucliente.ci')
            ->select('movil.numeroplaca', 'uchofer.ci as cichofer', 'uchofer.nombre as nombrechofer', 'viaje.id', 'viaje.fecha', 'viaje.hora', 'viaje.puntopartida', 'viaje.puntollegada', 'ucliente.nombre as nombrecliente', 'ucliente.apellido as apellidocliente')
            ->where('uchofer.ci', $identity->ci)
            ->where('movil.estado', 'Ocupado')
            ->get();
        $movil = Movil::join('usuario', 'movil.chofer_ci', '=', 'usuario.ci')
            ->select('movil.numeroplaca', 'movil.color', 'movil.marca', 'movil.modelo', 'movil.anho', 'movil.tipo', 'movil.estado')
            ->where('usuario.ci', $identity->ci)
            ->get();
        $falta = Falta::where('chofer_ci', $identity->ci)->get();
        $permiso = Permiso::where('chofer_ci', $identity->ci)->where('estado', 'Aceptado')->get();
        $user = Usuario::find($identity->ci);
        $data = array(
            'movil' => $movil,
            'estado' => $estado,
            'falta' => $falta,
            'permiso' => $permiso,
            'usuario' => $user
        );
        return view('v2.chofer.menu-chofer', ['data' => $data]);
    }
}
