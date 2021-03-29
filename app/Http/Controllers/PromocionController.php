<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use App\Models\Servicio;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'nombre' => 'required|string|max:30',
            'fechainicio' => 'required',
            'fechafin' => 'required',
            'descuento' => 'required|numeric',
            'servicio_id' => 'required|numeric'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'fechainicio.required' => 'La fecha de inicio es requerida',
            'fechafin.required' => 'La fecha fin es requerida',
            'descuento.required' => 'El descuento es requerido',
            'descuento.numeric' => 'El descuento debe contener solo numeros',
            'servicio_id.required' => 'El ID del servicio es requerido',
            'servicio_id.numeric' => 'El ID del servicio debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        $promocion = Promocion::create([
            'nombre' => $request->nombre,
            'fechainicio' => $request->fechainicio,
            'fechafin' => $request->fechafin,
            'descuento' => $request->descuento,
            'servicio_id' => $request->servicio_id
        ]);
        return response()->json($promocion);
    }

    public function update($id, Request $request) {
        $campos=[
            'nombre' => 'required|string|max:30',
            'fechainicio' => 'required',
            'fechafin' => 'required',
            'descuento' => 'required|numeric',
            'servicio_id' => 'required|numeric'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'fechainicio.required' => 'La fecha de inicio es requerida',
            'fechafin.required' => 'La fecha fin es requerida',
            'descuento.required' => 'El descuento es requerido',
            'descuento.numeric' => 'El descuento debe contener solo numeros',
            'servicio_id.required' => 'El ID del servicio es requerido',
            'servicio_id.numeric' => 'El ID del servicio debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        Promocion::where('id', $id)
            ->update([
                'nombre' => $request->nombre,
                'fechainicio' => $request->fechainicio,
                'fechafin' => $request->fechafin,
                'descuento' => $request->descuento,
                'servicio_id' => $request->servicio_id
            ]);
        $promocion = Promocion::find($id);
        return response()->json($promocion);
    }

    public function destroy($id) {
        $promocion = Promocion::find($id);
        $promocion->delete();
        return response()->json($promocion);
    }

    public function index() {
        $promocion = Promocion::addSelect([
            'nombreservicio' => Servicio::select('nombre')->whereColumn('id', 'promocion.servicio_id'),
            'descripcion' => Servicio::select('descripcion')->whereColumn('id', 'promocion.servicio_id')
        ])->get();
        $servicio = Servicio::all();
        $data = array(
            'promocion' => $promocion,
            'servicio' => $servicio
        );
        return view('v2.nueva-promocion', ['data' => $data]);
    }

    public function listarPromocionServicio(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $promocion = Promocion::addSelect([
            'nombreservicio' => Servicio::select('nombre')->whereColumn('id', 'promocion.servicio_id'),
            'descripcion' => Servicio::select('descripcion')->whereColumn('id', 'promocion.servicio_id')
        ])->get();
        $user = Usuario::find($identity->ci);
        $data = array(
            'promocion' => $promocion,
            'usuario' => $user
        );

        return view('v2.chofer.promocion', ['data' => $data]);
    }
}
