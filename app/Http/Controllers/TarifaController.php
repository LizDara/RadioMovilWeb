<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Tarifa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TarifaController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'precio' => 'required|numeric',
            'kilometro' => 'required|numeric',
            'servicio_id' => 'required|numeric'
        ];
        $mensajes = [
            'precio.required' => 'El precio es requerido',
            'precio.numeric' => 'El precio debe contener solo numeros',
            'kilometro.required' => 'El kilometro es requerido',
            'kilometro.numeric' => 'El kilometro debe contener solo numeros',
            'servicio_id.required' => 'El ID del servicio es requerido',
            'servicio_id.numeric' => 'El ID del servicio debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        $tarifa = Tarifa::create([
            'precio' => $request->precio,
            'kilometro' => $request->kilometro,
            'servicio_id' => $request->servicio_id
        ]);
        return response()->json($tarifa);
    }

    public function update($id, Request $request) {
        $campos=[
            'precio' => 'required|numeric',
            'kilometro' => 'required|numeric',
            'servicio_id' => 'required|numeric'
        ];
        $mensajes = [
            'precio.required' => 'El precio es requerido',
            'precio.numeric' => 'El precio debe contener solo numeros',
            'kilometro.required' => 'El kilometro es requerido',
            'kilometro.numeric' => 'El kilometro debe contener solo numeros',
            'servicio_id.required' => 'El ID del servicio es requerido',
            'servicio_id.numeric' => 'El ID del servicio debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        Tarifa::where('id', $id)
            ->update([
                'precio' => $request->precio,
                'kilometro' => $request->kilometro,
                'servicio_id' => $request->servicio_id
            ]);
        $tarifa = Tarifa::find($id);
        return response()->json($tarifa);
    }

    public function destroy($id) {
        $tarifa = Tarifa::find($id);
        $tarifa->delete();
        return response()->json($tarifa);
    }

    public function index() {
        $tarifa = Tarifa::addSelect([
            'nombre' => Servicio::select('nombre')->whereColumn('id', 'tarifa.id'),
            'descripcion' => Servicio::select('descripcion')->whereColumn('id', 'tarifa.id')
        ])->get();
        $servicio = Servicio::all();
        $data = array(
            'tarifa' => $tarifa,
            'servicio' => $servicio
        );
        return response()->json($data);
    }

    public function listarTarifa(Request $request) {
        $tarifaTraslado = Tarifa::where('servicio_id', 1)->get();
        $tarifaMudanza = Tarifa::where('servicio_id', 2)->get();
        $tarifaViaje = Tarifa::where('servicio_id', 3)->get();
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $user = Usuario::find($identity->ci);
        $data = array(
            'tarifaTraslado' => $tarifaTraslado,
            'tarifaMudanza' => $tarifaMudanza,
            'tarifaViaje' => $tarifaViaje,
            'usuario' => $user
        );
    }

    public function listarTarifaServicio($id) {
        $tarifa = Tarifa::where('servicio_id', $id)->get();
        return response()->json($tarifa);
    }
}
