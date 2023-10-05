<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        $input = $request->all();
        $validator = Validator::make($input,[
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422, 
                'msg' => 'Bad request',
                "errors"=>$validator->errors()
            ], 422);
        }

        unset($input['confirm_password']);
        $input['password'] = Hash::make($input['password']);
        $query = User::create($input);
        $response['token'] = $query->createToken('users')->accessToken;
        $response['user'] = $query;

        return response()->json($response, 201);

    }

    public function login(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[           
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422, 
                'msg' => 'Bad request',
                "errors"=>$validator->errors()
            ], 422);
        }

        $checkUser = User::where('email', '=',$input['email'])->first();
        if (@count($checkUser) > 0) {
            $psw = $input['password'];
            if (Hash::check($psw, $checkUser['password'])) {
                $response['token'] = $checkUser->createToken('users')->accessToken;
                $response['user'] = $checkUser;
                $response['msg'] = 'Inicio de sesion exitoso';
                $response['status'] = 200;
                return response()->json($response, 200);
            }
            else{
                $response['msg'] = 'Verifica bien tus credenciales';
                $response['status'] = 401;
                return response()->json($response, 401);
            }
        }
    }

    public function listUser()
    {
        $users = User::get();

        return response()->json(['status' => 200, "users" => $users]);
    }
}
