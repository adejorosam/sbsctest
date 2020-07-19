<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistrationRequest;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use App\Mail\WelcomeNewUser;
use Mail;

class AuthController extends Controller
{
    //
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['register', 'login']]);
    }



     /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = $this->guard()->attempt($credentials);
        try {
            if (! $token) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return $this->respondWithToken($token);
    }

    public function register(UserRegistrationRequest $request){
        $validated = $request->validated();
        $validated['password'] = \Hash::make($validated['password']);
        $user = User::create($validated);
        if($user){
            //  Send mail to the registered user
            Mail::to($user['email'])->send(new WelcomeNewUser());
            $response = [
                "success" => true,
                "message" => "Registration successful",
                "data" => $user
            ];
            return response()->json($response, 201);
        }
        else{
            $response = [
                "success" => false,
                "message" => "Error",
                "data" => null
            ];
            return response()->json($response, 401);
        }
    }
    
   /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
     public function logout()
    {
        $this->guard()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
     protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
}