<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{

    private $errors = [];

    public function login(Request $request)
    {
    
        $user = User::where('email',$request->email)->first();

        /*check if user of given email exists */
        if(!$user){
            return response()->json([
                'status'=>false,
                'error'=>'Invalid email or password provided.'
            ],200);
        }

        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'status'=>false,
                'error'=>'Invalid email or password provided.'
            ],200);
        }

        $token = $user->createToken('laravel-sactrum-token')->plainTextToken;

        $response = [
            'status'=>true,
            'user' => $user,
            'token' => $token
        ];

         return response($response, 200);
    }

    public function userDetails(){

        $response = [
            'status'=>true,
            'user' => auth()->user(),
        ];

         return response($response, 200);
    }

    public function logout(){

        $user = request()->user();

        if(!$user->tokens()->where('id', $user->currentAccessToken()->id)->delete()){
            return response()->json([
                'status'=>false,
                'error'=>'Couldnot logout with the token provided for the user.'
            ],200);
        }
        return response([
            'status'=>true,
            'message'=>"Logout successfully"
        ],200);
    }

    public function register(Request $request){

        $data = $request->only('email','password','name');

        if(!$this->validateParams($data)){
            return response([
                "status"=>false,
                "message"=>$this->errors
            ],200);
        }

        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            "password"=>Hash::make($data['password'])
        ]);

        return response([
            'status'=>true,
            'user'=>$user
        ],200);
    }

    private function validateParams($data){

        if (!isset($data['name'])) {
            $this->errors[] = 'parameter `name` is required while registering.';
            return false;
        }

        if (!isset($data['email'])) {
            $this->errors[] = 'parameter `email` is required while registering.';
            return false;
        }

        if (!isset($data['password'])) {
            $this->errors[] = 'parameter `password` is required while registering.';
            return false;
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Invalid value provided for parameter `email` while registering.';
            return false;
        }

        if (User::where('email',$data['email'])->first()) {
            $this->errors[] = 'User already exists with the given email.';
            return false;
        }

        return true;
    }
}
