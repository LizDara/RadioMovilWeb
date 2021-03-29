<?php

namespace App\Http\Controllers;

use App\Models\Falta;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class FaltaController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'fecha' => 'required',
            'motivo' => 'required|string|max:50',
            'chofer_ci' => 'required|numeric'
        ];
        $mensajes = [
            'fecha.required' => 'La fecha es requerida',
            'motivo.required' => 'El motivo es requerido',
            'motivo.string' => 'El motivo debe ser un texto',
            'motivo.max' => 'El motivo es demasiado largo',
            'chofer_ci.required' => 'El CI del chofer es requerido',
            'chofer_ci.numeric' => 'El CI del chofer debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $falta = Falta::create([
            'fecha' => $request->fecha,
            'motivo' => $request->motivo,
            'chofer_ci' => $request->chofer_ci,
            'admin_ci' => $identity->ci
        ]);
        return response()->json($falta);
    }

    public function update($id, Request $request) {
        $campos=[
            'fecha' => 'required',
            'motivo' => 'required|string|max:50',
            'chofer_ci' => 'required|numeric'
        ];
        $mensajes = [
            'fecha.required' => 'La fecha es requerida',
            'motivo.required' => 'El motivo es requerido',
            'motivo.string' => 'El motivo debe ser un texto',
            'motivo.max' => 'El motivo es demasiado largo',
            'chofer_ci.required' => 'El CI del chofer es requerido',
            'chofer_ci.numeric' => 'El CI del chofer debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        Falta::where('id', $id)
            ->update([
                'fecha' => $request->fecha,
                'motivo' => $request->motivo,
                'chofer_ci' => $request->chofer_ci,
                'admin_ci' => $identity->ci
            ]);
        $falta = Falta::find($id);
        return response()->json($falta);
    }

    public function destroy($id) {
        $falta = Falta::find($id);
        $falta->delete();
        return response()->json($falta);
    }

    public function index(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $falta = Falta::addSelect([
            'nombrechofer' => Usuario::select('nombre')->whereColumn('ci', 'falta.chofer_ci'),
            'apellidochofer' => Usuario::select('apellido')->whereColumn('ci', 'falta.chofer_ci'),
            'nombreadmin' => Usuario::select('nombre')->whereColumn('ci', 'falta.admin_ci'),
            'apellidoadmin' => Usuario::select('apellido')->whereColumn('ci', 'falta.admin_ci')
        ])->get();
        $user = Usuario::find($identity->ci);
        $chofer = Usuario::where('tipo', 'chofer')->get();
        $data = array(
            'falta' => $falta,
            'chofer' => $chofer,
            'usuario' => $user,
        );

        return view('v2.admin.falta', ['data' => $data]);
    }

    public function listarFaltaChofer(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $falta = Falta::where('chofer_ci', $identity->ci)
            ->get();
        $user = Usuario::find($identity->ci);
        $data = array(
            'usuario' => $user,
            'falta' => $falta
        );

        return view('v2.chofer.falta', ['data' => $data]);
    }
}
