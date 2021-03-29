<?php

namespace App\Http\Controllers;

use App\Models\Movil;
use App\Models\Permiso;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PermisoController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'fechainicio' => 'required',
            'fechafin' => 'required',
            'motivo' => 'required|string|max:100'
        ];
        $mensajes = [
            'fechainicio.required' => 'La fecha de inicio es requerida',
            'fechafin.required' => 'La fecha fin es requerida',
            'motivo.required' => 'El motivo es requerido',
            'motivo.string' => 'El motivo debe ser un texto',
            'motivo.max' => 'El motivo es demasiado largo'
        ];
        $this->validate($request, $campos, $mensajes);
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $fecha = \date('Y-m-d');
        $permiso = Permiso::create([
            'fechasolicitud' => $fecha,
            'fechainicio' => $request->fechainicio,
            'fechafin' => $request->fechafin,
            'motivo' => $request->motivo,
            'estado' => 'Pendiente',
            'chofer_ci' => $identity->ci
        ]);
        return response()->json($permiso);
    }

    public function update($id, Request $request) {
        $campos=[
            'fechainicio' => 'required',
            'fechafin' => 'required',
            'motivo' => 'required|string|max:100'
        ];
        $mensajes = [
            'fechainicio.required' => 'La fecha de inicio es requerida',
            'fechafin.required' => 'La fecha fin es requerida',
            'motivo.required' => 'El motivo es requerido',
            'motivo.string' => 'El motivo debe ser un texto',
            'motivo.max' => 'El motivo es demasiado largo'
        ];
        $this->validate($request, $campos, $mensajes);
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        Permiso::where('id', $id)
            ->update([
                'fechainicio' => $request->fechainicio,
                'fechafin' => $request->fechafin,
                'motivo' => $request->motivo,
                'chofer_ci' => $identity->ci
            ]);
        $permiso = Permiso::find($id);
        return response()->json($permiso);
    }

    public function destroy($id) {
        $permiso = Permiso::find($id);
        $permiso->delete();
        return response()->json($permiso);
    }

    public function index() {
        $permiso = Permiso::addSelect([
            'nombre' => Usuario::select('nombre')->whereColumn('ci', 'permiso.chofer_ci'),
            'apellido' => Usuario::select('apellido')->whereColumn('ci', 'permiso.chofer_ci')
        ])->get();
        return response()->json($permiso);
    }

    public function modificarEstado($id, Request $request) {
        Permiso::where('id', $id)
            ->update([
                'estado' => $request->estado
            ]);
        if ($request->estado == 'Aceptado') {
            $permiso = Permiso::addSelect([
                'numeroplaca' => Movil::select('numeroplaca')->whereColumn('chofer_ci', 'permiso.chofer_ci')
            ])->get();
            Movil::where('numeroplaca', $permiso->numeroplaca)
                ->update([
                    'estado' => 'Fuera de Servicio'
                ]);
        }
        $permiso = Permiso::find($id);
        return response()->json($permiso);
    }

    public function listarPermisoChofer(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $permiso = Permiso::where('chofer_ci', $identity->ci)
            ->get();
        $user = Usuario::find($identity->ci);
        $data = array(
            'usuario' => $user,
            'permiso' => $permiso
        );

        return view('v2.chofer.permiso', ['data' => $data]);
    }

    public function listarPermiso(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $permisoPendiente = Permiso::join('usuario', 'permiso.chofer_ci', '=', 'usuario.ci')
            ->select('permiso.id', 'permiso.fechasolicitud', 'permiso.fechainicio', 'permiso.fechafin', 'permiso.motivo', 'permiso.estado', 'usuario.nombre', 'usuario.apellido')
            ->where('permiso.estado', 'Pendiente')->get();
        $permiso = Permiso::join('usuario', 'permiso.chofer_ci', '=', 'usuario.ci')
            ->select('permiso.id', 'permiso.fechasolicitud', 'permiso.fechainicio', 'permiso.fechafin', 'permiso.motivo', 'permiso.estado', 'usuario.nombre', 'usuario.apellido')
            ->where('permiso.estado', '<>', 'Pendiente')->get();
        $user = Usuario::find($identity->ci);
        $data = array(
            'permisoPendiente' => $permisoPendiente,
            'permiso' => $permiso,
            'usuario' =>$user
        );
    }
}
