<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class UsuarioController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'ci' => 'required|numeric|unique:usuario',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'fechanacimiento' => 'required',
            'direccion' => 'required|string|max:200',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|unique:usuario',
            'contrasena' => 'required|min:4',
            'contrasena_confirmar' => 'required|same:contrasena',
            'tipo' => 'required|string|max:7'
        ];
        $mensajes = [
            'ci.required' => 'El CI es requerido',
            'ci.unique' => 'El CI ya existe',
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'apellido.required' => 'El apellido es requerido',
            'apellido.string' => 'El apellido debe ser un texto',
            'apellido.max' => 'El apellido es demasiado largo',
            'fechanacimiento.required' => 'La fecha de nacimiento es requerida',
            'direccion.required' => 'La direccion es requerida',
            'direccion.string' => 'La direccion debe ser un texto',
            'direccion.max' => 'La direccion es demasiado larga',
            'telefono.required' => 'El numero de telefono es requerido',
            'telefono.numeric' => 'El numero de telefono debe contener solo numeros',
            'correo.required' => 'El correo es requerido',
            'correo.email' => 'El correo no es valido',
            'correo.unique' => 'El correo ya existe, por favor ingrese otro email',
            'contrasena.required' => 'La contraseña es requerida',
            'contrasena.min' => 'La contraseña debe contener al menos 4 caracteres',
            'contrasena_confirmar.required' => 'Debe confirmar la contraseña',
            'contrasena_confirmar.same' => 'Las contraseñas no coinciden',
            'tipo.required' => 'El tipo es requerido',
            'tipo.numeric' => 'El tipo debe ser un texto',
            'tipo.max' => 'El tipo es demasiado largo'
        ];
        $this->validate($request, $campos, $mensajes);
        $user = Usuario::create([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fechanacimiento' => $request->fechanacimiento,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'contrasena' => md5($request->contrasena),
            'tipo' => $request->tipo
        ]);
        return response()->json($user);
    }

    public function update(Request $request) {
        $campos=[
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'fechanacimiento' => 'required',
            'direccion' => 'required|string|max:200',
            'telefono' => 'required|numeric'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'apellido.required' => 'El apellido es requerido',
            'apellido.string' => 'El apellido debe ser un texto',
            'apellido.max' => 'El apellido es demasiado largo',
            'fechanacimiento.required' => 'La fecha de nacimiento es requerida',
            'direccion.required' => 'La direccion es requerida',
            'direccion.string' => 'La direccion debe ser un texto',
            'direccion.max' => 'La direccion es demasiado larga',
            'telefono.required' => 'El numero de telefono es requerido',
            'telefono.numeric' => 'El numero de telefono debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        Usuario::where('ci', $identity->ci)
            ->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'fechanacimiento' => $request->fechanacimiento,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono
            ]);
        $user = Usuario::find($identity->ci);
        $token = $jwtAuth->signup($user->correo, $user->contrasena);

        return $token;
    }

    public function destroy($ci) {
        $user = Usuario::find($ci);
        $user->delete();
        return response()->json($user);
    }

    public function index(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $user = Usuario::find($identity->ci);
        $users = Usuario::where('tipo', '<>', 'admin')
            ->get();
        $data = array(
            'usuarios' => $users,
            'usuario' => $user
        );
        return response()->json($user);
    }

    public function show(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $user = Usuario::find($identity->ci);

        return view('v2.modificar-perfil', ['usuario' => $user]);
    }

    public function cantidadUsuarios() {
        $count = Usuario::count();
        return response()->json($count);
    }

    public function sumaDineroChofer() {
        $user = Usuario::join('movil', 'usuario.ci', '=', 'movil.chofer_ci')
            ->join('viaje', 'movil.numeroplaca', '=', 'viaje.movil_numeroplaca')
            ->select('usuario.ci', 'usuario.nombre', 'usuario.apellido', DB::raw('SUM(viaje.monto) as monto'))
            ->groupBy('usuario.ci', 'usuario.nombre', 'usuario.apellido')
            ->get();
        return response()->json($user);
    }

    public function choferesDisponibles() {
        $user = Usuario::join('movil', 'usuario.ci', '=', 'movil.chofer_ci')
            ->select('usuario.ci', 'usuario.nombre', 'usuario.apellido', 'movil.numeroplaca')
            ->where('movil.estado', 'Disponible')
            ->get();
        return response()->json($user);
    }

    public function cantidadViajeCliente() {
        $user = Usuario::join('viaje', 'usuario.ci', '=', 'viaje.cliente_ci')
            ->select('usuario.ci', 'usuario.nombre', 'usuario.apellido', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('usuario.ci', 'usuario.nombre', 'usuario.apellido')
            ->get();
        return response()->json($user);
    }

    public function cantidadFaltaChofer() {
        $user = Usuario::join('falta', 'usuario.ci', '=', 'falta.chofer_ci')
            ->select('usuario.ci', 'usuario.nombre', 'usuario.apellido', DB::raw('COUNT(*) as cantidad'))
            ->groupBy('usuario.ci', 'usuario.nombre', 'usuario.apellido')
            ->get();
        return response()->json($user);
    }
}
