<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use stdClass;
use App\Models\login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function registrar(Request $request){

       $validator = Validator::make($request->all(),[
            "name"=>"required|string|max:255",
            "email"=> "required|string|email|max:255|unique:users",
            "password"=> "required|string|min:8",

       ]);
       if($validator->fails()){
             return response()->json(['mensaje'=>$validator->errors()], 401);    
       }

       $user = User::create([
        "name"=> $request->name,
        "email"=> $request->email,
        "password"=> bcrypt($request->password),

       ]);
        $token = $user->createToken("auth_token")->plainTextToken;

        return response()->json(['data'=> $user, 'token'=> $token, 'token_type'=> 'Bearer']);

    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json([
                'message'=> 'invalid login details'
            ],401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'mensaje'=>'Hola, '.$user->name,
            'access_token'=> $token,
            'token_type'=> 'Bearer',
            'user'=> $user,
        ]);

    }

  

    public function logout(Request $request) {
            $request->user()->tokens()->delete();
            return ['message' => 'You hace successfully logged out and the token was successfully deleted'];
        }





    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(login $login)
    {
        //
    }
}
