<?php
namespace App\Helpers;

use App\Models\Usuario;
use \Firebase\JWT\JWT;

class JwtAuth
{
    public function __construct()
    {
        $this->key = 'clave_privada_tecno_web';
    }

    public function signup($correo, $contrasena)
    {
        $user = Usuario::where([
            'correo' => $correo,
            'contrasena' => $contrasena
        ])->first();

        if (is_object($user)) {
            $token = array(
                'ci' => $user->ci,
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
                'tipo' => $user->tipo
            );
            $jwt = JWT::encode($token, $this->key, 'HS256');
            $data = array(
                'token' => $jwt,
                'tipo' => $user->tipo
            );
            return response()->json($data);
        }
        $data = array(
            'code' => 400,
            'status' => 'error',
            'message' => 'Correo o contraseña incorrecto.'
        );
        return response()->json($data, $data['code']);
    }

    public function checkToken($jwt, $getIdentity = false)
    {
        $auth = false;
        try {
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
        } catch (\UnexpectedValueException $e) {
            echo $e;
            $auth = false;
        } catch (\DomainException $e) {
            $auth = false;
        }

        if (!empty($decoded) && is_object($decoded) && isset($decoded->sub)) {
            $auth = true;
        } else {
            $auth = false;
        }

        if ($getIdentity) {
            return $decoded;
        }

        return $auth;
    }
}
