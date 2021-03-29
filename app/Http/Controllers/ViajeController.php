<?php

namespace App\Http\Controllers;

use App\Models\Movil;
use App\Models\Servicio;
use App\Models\Usuario;
use App\Models\Viaje;
use Cassandra\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ViajeController extends Controller
{
    public function store(Request $request) {
        $campos=[
            'fecha' => 'required',
            'hora' => 'required',
            'puntopartida' => 'required|string|max:100',
            'puntollegada' => 'required|string|max:100',
            'cliente_ci' => 'required|numeric',
            'servicio_id' => 'required|numeric'
        ];
        $mensajes = [
            'fecha.required' => 'La fecha es requerida',
            'hora.required' => 'La hora es requerida',
            'puntopartida.required' => 'El punto de partida es requerido',
            'puntopartida.string' => 'El punto de partida debe ser un texto',
            'puntopartida.max' => 'El punto de partida es demasiado largo',
            'puntollegada.required' => 'El punto de llegada es requerido',
            'puntollegada.string' => 'El punto de llegada debe ser un texto',
            'puntollegada.max' => 'El punto de partida es demasiado largo',
            'cliente_ci.required' => 'El CI del cliente es requerido',
            'cliente_ci.numeric' => 'El CI del cliente debe contener solo numeros',
            'servicio_id.required' => 'El ID del servicio es requerido',
            'servicio_id.numeric' => 'El ID del servicio debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $viaje = Viaje::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'puntopartida' => $request->puntopartida,
            'puntollegada' => $request->puntollegada,
            'monto' => 0,
            'kilometro' => 0,
            'cliente_ci' => $identity->ci,
            'servicio_id' => $request->servicio_id
        ]);
        return response()->json($viaje);
    }

    public function update($id, Request $request) {
        $campos=[
            'fecha' => 'required',
            'hora' => 'required',
            'puntopartida' => 'required|string|max:100',
            'puntollegada' => 'required|string|max:100',
            'cliente_ci' => 'required|numeric',
            'servicio_id' => 'required|numeric'
        ];
        $mensajes = [
            'fecha.required' => 'La fecha es requerida',
            'hora.required' => 'La hora es requerida',
            'puntopartida.required' => 'El punto de partida es requerido',
            'puntopartida.string' => 'El punto de partida debe ser un texto',
            'puntopartida.max' => 'El punto de partida es demasiado largo',
            'puntollegada.required' => 'El punto de llegada es requerido',
            'puntollegada.string' => 'El punto de llegada debe ser un texto',
            'puntollegada.max' => 'El punto de partida es demasiado largo',
            'cliente_ci.required' => 'El CI del cliente es requerido',
            'cliente_ci.numeric' => 'El CI del cliente debe contener solo numeros',
            'servicio_id.required' => 'El ID del servicio es requerido',
            'servicio_id.numeric' => 'El ID del servicio debe contener solo numeros'
        ];
        $this->validate($request, $campos, $mensajes);
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        Viaje::where('id', $id)
            ->update([
                'fecha' => $request->fecha,
                'hora' => $request->hora,
                'puntopartida' => $request->puntopartida,
                'puntollegada' => $request->puntollegada,
                'cliente_ci' => $identity->ci,
                'servicio_id' => $request->servicio_id
            ]);
        $viaje = Viaje::find($id);
        return response()->json($viaje);
    }

    public function destroy($id) {
        $viaje = Viaje::find($id);
        $viaje->delete();
        return response()->json($viaje);
    }

    public function index(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $viaje = Viaje::addSelect([
            'color' => Movil::select('color')->whereColumn('numeroplaca', 'viaje.movil_numeroplaca'),
            'marca' => Movil::select('marca')->whereColumn('numeroplaca', 'viaje.movil_numeroplaca'),
            'nombre' => Usuario::select('nombre')->whereColumn('ci', 'viaje.cliente_ci'),
            'apellido' => Usuario::select('apellido')->whereColumn('ci', 'viaje.cliente_ci'),
            'nombreservicio' => Servicio::select('nombre')->whereColumn('id', 'viaje.servicio_id'),
            'descripcionservicio' => Servicio::select('descripcion')->whereColumn('id', 'viaje.servicio_id')
        ])->get();
        $user = Usuario::find($identity->ci);
        $data = array(
            'viaje' => $viaje,
            'usuario' => $user
        );

        return view('v2.admin.viaje', ['data' => $data]);
    }

    public function listarViaje(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $viaje = Viaje::addSelect([
            'color' => Movil::select('color')->whereColumn('numeroplaca', 'viaje.movil_numeroplaca'),
            'marca' => Movil::select('marca')->whereColumn('numeroplaca', 'viaje.movil_numeroplaca'),
            'nombre' => Usuario::select('nombre')->whereColumn('ci', 'viaje.cliente_ci'),
            'apellido' => Usuario::select('apellido')->whereColumn('ci', 'viaje.cliente_ci'),
            'nombreservicio' => Servicio::select('nombre')->whereColumn('id', 'viaje.servicio_id'),
            'descripcionservicio' => Servicio::select('descripcion')->whereColumn('id', 'viaje.servicio_id')
        ])->get();
        $user = Usuario::find($identity->ci);
        $data = array(
            'viaje' => $viaje,
            'usuario' => $user
        );

        return view('v2.admin.viaje', ['data' => $data]);
    }

    public function listarViajeSinMovil(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $viaje = Viaje::join('usuario', 'viaje.cliente_ci', '=', 'usuario.ci')
            ->select('usuario.nombre', 'usuario.apellido', 'viaje.id', 'viaje.fecha', 'viaje.hora', 'viaje.puntopartida', 'viaje.puntollegada')
            ->whereNull('viaje.movil_numeroplaca')
            ->get();
        $movil = Movil::join('usuario', 'movil.chofer_ci', '=', 'usuario.ci')
            ->select('movil.numeroplaca', 'movil.chofer_ci', 'usuario.nombre', 'usuario.apellido')
            ->where('movil.estado', 'Disponible')
            ->get();
        $user = Usuario::find($identity->ci);
        $data = array(
            'viajes' => $viaje,
            'moviles' => $movil,
            'usuario' => $user
        );

        return view('v2.admin.menu-admin', ['data' => $data]);
    }

    public function modificarMovil($id, Request $request) {
        $movil = Movil::where('numeroplaca', $request->movil_numeroplaca)
            ->where('estado', 'Disponible');
        Viaje::where('id', $id)
            ->update([
                'movil_numeroplaca' => $request->movil_numeroplaca
            ]);
        Movil::where('numeroplaca', $request->movil_numeroplaca)
            ->update([
                'estado' => 'Ocupado'
            ]);
        return response()->json($movil);
    }

    public function modificarKilometroMonto($id, Request $request) {
        $tarifa = Viaje::join('servicio', 'viaje.servicio_id', '=', 'servicio.id')
            ->join('tarifa', 'servicio.id', '=', 'tarifa.servicio_id')
            ->select('servicio.nombre', 'viaje.fecha', 'tarifa.precio')
            ->where([['viaje.id', '=', $id], ['tarifa.kilometro', '=', $request->kilometro]])
            ->get();
        /*$promocion = Viaje::join('servicio', 'viaje.servicio_id', '=', 'servicio.id')
            ->join('promocion', 'servicio.id', '=', 'promocion.servicio_id')
            ->select('promocion.descuento')
            ->where('viaje.id', $id)
            ->where('promocion.fechainicio', '<=', 'viaje.fecha')
            ->where('promocion.fechafin', '>=', 'viaje.fecha')
            ->get();*/
        if (is_object($tarifa)) {
            $monto = $tarifa[0]->precio;
            /*if (is_object($promocion)) {
                $descuento = $tarifa->precio * $promocion->descuento;
                $monto = $monto - $descuento;
            }*/
            Viaje::where('id', $id)
                ->update([
                    'kilometro' => $request->kilometro,
                    'monto' => $monto
                ]);
            Movil::where('numeroplaca', $tarifa->movil_numeroplaca)
                ->update([
                    'estado' => 'Disponible'
                ]);
            $viaje = Viaje::find($id);
            return response()->json($viaje);
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo modificar el monto y kilometro del viaje.'
        );
        return response()->json($data, $data['code']);
    }

    public function listarViajeCliente(Request $request) {
        $token = $request->cookie('token');
        $jwtAuth = new \App\Helpers\JwtAuth();
        $identity = $jwtAuth->checkToken($token, true);
        $viaje = Viaje::where('cliente_ci', $identity->ci)
            ->get();
        return response()->json($viaje);
    }
}
