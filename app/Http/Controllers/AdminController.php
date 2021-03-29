<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
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
            'codigo' => 'required|numeric'
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
            'codigo.required' => 'El codigo es requerido',
            'codigo.numeric' => 'El codigo debe contener solo numeros'
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
            $admin = Admin::create([
                'ci' => $request->ci,
                'codigo' => $request->codigo
            ]);
            if (is_object($admin))
                return response()->json($user, 200);
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo registrar el administrador.'
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
            'codigo' => 'required|numeric'
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
            'codigo.required' => 'El codigo es requerido',
            'codigo.numeric' => 'El codigo debe contener solo numeros'
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
            $admin = Admin::where('ci', $ci)
                ->update([
                    'codigo' => $request->codigo
                ]);
            if (is_object($admin))
                return response()->json($user, 200);
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo modificar el administrador.'
        );
        return response()->json($data, $data['code']);
    }

    public function destroy($ci) {
        $user = Usuario::find($ci);
        if (is_object($user)) {
            $admin = Admin::find($ci);
            if (is_object($admin)) {
                $user->delete();
                $admin->delete();
                return response()->json($user, 200);
            }
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo eliminar el administrador.'
        );
        return response()->json($data, $data['code']);
    }
}
