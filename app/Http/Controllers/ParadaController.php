<?php

namespace App\Http\Controllers;

use App\Models\Parada;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ParadaController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'nombre' => 'required|string|max:50',
            'direccion' => 'required|string|max:100'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'direccion.required' => 'La direccion es requerido',
            'direccion.string' => 'La direccion debe ser un texto',
            'direccion.max' => 'La direccion es demasiado larga',
        ];
        $this->validate($request, $campos, $mensajes);
        $parada = Parada::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion
        ]);
        return response()->json($parada);
    }

    public function update($id, Request $request) {
        $campos=[
            'nombre' => 'required|string|max:50',
            'direccion' => 'required|string|max:100'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'direccion.required' => 'La direccion es requerido',
            'direccion.string' => 'La direccion debe ser un texto',
            'direccion.max' => 'La direccion es demasiado larga',
        ];
        $this->validate($request, $campos, $mensajes);
        Parada::where('id', $id)
            ->update([
                'nombre' => $request->nombre,
                'direccion' => $request->direccion
            ]);
        $parada = Parada::find($id);
        return response()->json($parada);
    }

    public function destroy($id) {
        $parada = Parada::find($id);
        $parada->delete();
        return response()->json($parada);
    }

    public function index() {
        $parada = Parada::all();
        return view('v2.nueva-parada', ['paradas' => $parada]);
    }

    public function listarParada(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $parada = Parada::all();
        $user = Usuario::find($identity->ci);
        $data = array(
            'parada' => $parada,
            'usuario' => $user
        );
    }
}
