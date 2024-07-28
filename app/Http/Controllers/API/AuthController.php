<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request){
        $validateUser = Validator::make(
            $request->all(),
            [
                'name'=>'required',
                'contact'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required',
            ]
        );

        if($validateUser->fails()){
            return response()->json([
                'status'=> false,
                'message'=>'validation Error',
                'errors'=> $validateUser->errors()->all()
            ],401);
        }

        $user = User::create([
            'name'=> $request->name,
            'contact'=>$request->contact,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);

        return response()->json([
            'status'=> true,
            'message'=> 'User created successfully',
            'user'=> $user,
        ],200);
      }


    public function login(Request $request){
        $validateUser = validator::make(
            $request->all(),
            [
                'email' =>'required|email',
                'password'=>'required',
            ]
            );
            
            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Authentication failed',
                    'errors'=> $validateUser->errors()->all()
                ],404);
            }

            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $authUser = Auth::user();
                return response()->json([
                    'status' => true,
                    'message' =>'User logged in Successfully',
                    'token' => $authUser->createToken("Api Token")->plainTextToken,
                    'token_type' => 'bearer'
                ],200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Email & passsword doesnot match',
                ],401);
            }

    }

    public function logout(Request $request){

        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'status'=> true,
            'user'=> $user,
            'message'=> 'User loged out Successfully',
        ],200);

    }
}
