<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'ci' => 'required|numeric|unique:usuario',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'fechanacimiento' => 'required',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|unique:usuario',
            'contrasena' => 'required|min:8',
            'contrasena_confirmar' => 'required|same:contrasena',
            'direccion' => 'required|string|max:50'
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
            'telefono.required' => 'El numero de telefono es requerido',
            'telefono.numeric' => 'El numero de telefono debe contener solo numeros',
            'correo.required' => 'El correo es requerido',
            'correo.email' => 'El correo no es valido',
            'correo.unique' => 'El correo ya existe, por favor ingrese otro email',
            'contrasena.required' => 'La contraseña es requerida',
            'contrasena.min' => 'La contraseña debe contener al menos 8 caracteres',
            'contrasena_confirmar.required' => 'Debe confirmar la contraseña',
            'contrasena_confirmar.same' => 'Las contraseñas no coinciden',
            'direccion.required' => 'La direccion es requerida',
            'direccion.string' => 'La direccion debe ser un texto',
            'direccion.max' => 'La direccion es demasiado larga'
        ];
        $this->validate($request, $campos, $mensajes);
        $user = Usuario::create([
            'ci' => $request->ci,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fechanacimiento' => $request->fechaNacimiento,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'contrasena' => md5($request->contrasena)
        ]);
        if (is_object($user)) {
            $cliente = Cliente::create([
                'ci' => $request->ci,
                'direccion' => $request->direccion
            ]);
            if (is_object($cliente))
                return response()->json($user, 200);
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo registrar el cliente.'
        );
        return response()->json($data, $data['code']);
    }

    public function update($ci, Request $request) {
        $campos=[
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'fechanacimiento' => 'required',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|unique:usuario',
            'direccion' => 'required|string|max:50'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'apellido.required' => 'El apellido es requerido',
            'apellido.string' => 'El apellido debe ser un texto',
            'apellido.max' => 'El apellido es demasiado largo',
            'fechanacimiento.required' => 'La fecha de nacimiento es requerida',
            'telefono.required' => 'El numero de telefono es requerido',
            'telefono.numeric' => 'El numero de telefono debe contener solo numeros',
            'correo.required' => 'El correo es requerido',
            'correo.email' => 'El correo no es valido',
            'correo.unique' => 'El correo ya existe, por favor ingrese otro email',
            'direccion.required' => 'La direccion es requerida',
            'direccion.string' => 'La direccion debe ser un texto',
            'direccion.max' => 'La direccion es demasiado larga'
        ];
        $this->validate($request, $campos, $mensajes);
        $user = Usuario::where('ci', $ci)
            ->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'fechanacimiento' => $request->fechaNacimiento,
                'telefono' => $request->telefono,
                'correo' => $request->correo
            ]);
        if (is_object($user)) {
            $cliente = Cliente::where('ci', $ci)
                ->update([
                    'direccion' => $request->direccion
                ]);
            if (is_object($cliente))
                return response()->json($user, 200);
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo modificar el cliente.'
        );
        return response()->json($data, $data['code']);
    }

    public function destroy($ci) {
        $user = Usuario::find($ci);
        if (is_object($user)) {
            $cliente = Cliente::find($ci);
            if (is_object($cliente)) {
                $user->delete();
                $cliente->delete();
                return response()->json($user, 200);
            }
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo eliminar el cliente.'
        );
        return response()->json($data, $data['code']);
    }

    public function index() {
        $cliente = Cliente::addSelect([
            'nombre' => Usuario::select('nombre')->whereColumn('ci', 'cliente.ci'),
            'apellido' => Usuario::select('apellido')->whereColumn('ci', 'cliente.ci'),
            'fechanacimiento' => Usuario::select('fechanacimiento')->whereColumn('ci', 'cliente.ci'),
            'telefono' => Usuario::select('telefono')->whereColumn('ci', 'cliente.ci'),
            'correo' => Usuario::select('correo')->whereColumn('ci', 'cliente.ci')
        ])->get();
        if (is_object($cliente))
            return response()->json($cliente, 200);
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo listar los clientes.'
        );
        return response()->json($data, $data['code']);
    }
}
