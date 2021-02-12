<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\ResponseFormatter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use Exception;
use Illuminate\Support\Facades\Validator;

class apiAuthController extends Controller
{
    use PasswordValidationRules;

    public function login(Request $request)
    {
        try {
            //Validasi input data login
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // Cek Credentials login
            $credentials = request(['email', 'password']);

            if(!Auth::attempt($credentials))
            {
                return ResponseFormatter::error([
                    'message' => 'Unautorized',
                ], 'Authentication Failed', 500);
            }

            // jika hashing password gagal
            $user = User::where('email', $request->email)->first();
            if(!Hash::check($request->password, $user->password, []))
            {
                throw new Exception(('Invalide Credentials'));
            }

            // jika berhasil login
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            // $token = $tokenResult->accessToken();
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');

        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong on authentication',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        // $token = auth('sanctum')->user();
        if ($token)
        {
            return ResponseFormatter::success($token, 'Revoked');
        }
    }

    public function register(Request $request)
    {
        try {
                
            $validator = Validator::make($request->all(), [
                'name' => ['required','string','max:255'],
                'email' => ['required','string','email','max:255','unique:users'],
                'password' => $this->passwordRules()
            ]);
    
            if ($validator) {

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
    
                $user = User::where('email', $request->email)->first();
                
                $tokenResult = $user->createToken('authToken')->plainTextToken;
                
                return ResponseFormatter::success([
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user
                ]);
            }
            
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong on authentication',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }
}
