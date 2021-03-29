<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use App\Models\Servicio;
use App\Models\Tarifa;
use App\Models\Usuario;
use App\Models\Viaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:400'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'descripcion.required' => 'La direccion es requerido',
            'descripcion.string' => 'La descripcion debe ser un texto',
            'descripcion.max' => 'La descripcion es demasiado larga',
        ];
        $this->validate($request, $campos, $mensajes);
        $servicio = Servicio::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);
        return response()->json($servicio);
    }

    public function update($id, Request $request) {
        $campos=[
            'nombre' => 'required|string|max:30',
            'descripcion' => 'required|string|max:400'
        ];
        $mensajes = [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre es demasiado largo',
            'descripcion.required' => 'La direccion es requerido',
            'descripcion.string' => 'La descripcion debe ser un texto',
            'descripcion.max' => 'La descripcion es demasiado larga',
        ];
        $this->validate($request, $campos, $mensajes);
        Servicio::where('id', $id)
            ->update([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);
        $servicio = Servicio::find($id);
        return response()->json($servicio);
    }

    public function destroy($id) {
        $servicio = Servicio::find($id);
        $servicio->delete();
        return response()->json($servicio);
    }

    public function index() {
        $servicio = Servicio::all();

        return view('v2.nuevo-servicio', ['servicios' => $servicio]);
    }

    public function clienteIndex() {
        $servicio = Servicio::all();
        return view('v2.menu-cliente', ['services' => $servicio]);
    }

    public function listarServicio(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $servicio = Servicio::all();
        $user = Usuario::find($identity->ci);
        $data = array(
            'servicio' => $servicio,
            'usuario' => $user
        );
        return view('v2.menu-cliente', ['services' => $servicio]);
    }

    public function listarDetalleServicio($id, Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $tarifa = Tarifa::where('servicio_id', $id)->get();
        $promocion = Promocion::where('servicio_id', $id)->get();
        $viaje = Viaje::where('cliente_ci', $identity->ci)->get();
        $data = array(
            'tarifa' => $tarifa,
            'promocion' => $promocion,
            'viaje' => $viaje
        );
        return response()->json($data);
    }

    public function sumaDineroServicio() {
        $servicio = Servicio::join('viaje', 'servicio.id', '=', 'viaje.servicio_id')
            ->select('servicio.id', 'servicio.nombre', 'servicio.descripcion', DB::raw('SUM(viaje.monto) as monto'))
            ->groupBy('servicio.id', 'servicio.nombre', 'servicio.descripcion')
            ->get();
        return response()->json($servicio);
    }
}
