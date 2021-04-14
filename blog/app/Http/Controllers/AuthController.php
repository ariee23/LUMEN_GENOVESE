<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {

            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }

    }
 /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
          //validazione 
        $this->validate($request, [
           
           'email' => 'required|string',
           'password' => 'required|string',


        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        
        }
        return $this->respondWithToken($token);
    }
















/*
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            //'email' => 'required|string',
           // 'password' => 'required|string',
           'user_id' => 'required|string',
           'user_password' => 'required|string',


        ]);


        //$request->has('user_id') || !$request->has('user_password')




        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
           // return "no";
          //  return response()->json(['message' => 'Unauthorized'], 401);
          return "<script>alert('no');</script>";

        }

       // return $this->respondWithToken($token);
        return "<script>alert('si');</script>";
    }

*/
}//chiudo class