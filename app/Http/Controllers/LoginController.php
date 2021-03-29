<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $jwtAuth = new \App\Helpers\JwtAuth();
        $token = $jwtAuth->signup($request->correo, md5($request->contrasena));
        return $token;
    }

    public function changePassword(Request $request) {
        $ci = Usuario::where('contrasena', md5($request->oldPassword))
            ->get('ci');
        if (is_object($ci)) {
            $user = Usuario::where('ci', $ci)
                ->update([
                'contrasena' => md5($request->newPassword)
                ]);
            if (is_object($user))
                return response()->json($user, 200);
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'No se pudo modificar la contraseña.'
        );
        return response()->json($data, $data['code']);
    }
}
