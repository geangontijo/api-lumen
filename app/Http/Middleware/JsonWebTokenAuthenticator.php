<?php

namespace App\Http\Middleware;

use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class JsonWebTokenAuthenticator
{
    public function handle(Request $request, \Closure $next)
    {
        try{
            if (!$request->hasHeader('Authorization')) {
                throw new \InvalidArgumentException('');
            }
            $auth = $request->header('Authorization');
            $token = str_replace('Bearer ', '', $auth);
            $decode = JWT::decode($token, env('JWT_KEY'), ['HS256']);
            $usuario = User::query()->where('email', '=', $decode->email);

            if (is_null($usuario)) {
                throw new \DomainException('');
            }
            return $next($request);
        }catch (\Throwable $exception) {

            return response()->json('Inválid token', 401);
        }
    }
}
