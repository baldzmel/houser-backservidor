<?php

namespace App\Http\Controllers\api;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * log-in user to the site.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!auth()->attempt($credentials)){
            return response()->json([
                'success' => false,
            ]);
        }


        /** @var Users $user */
        $users = auth()->user();
        $users->tokens()->delete();
        $token = $users->createToken($users->email);
        return response()->json([
            'success' => true,
            'data' => array(
                'id_user' => $users->id_user,
                'email' => $users->email,
                'avatar' => $users->avatar,
                'name' => $users->name,
                'lastname' => $users->lastname,
                'telephone' => $users->telephone,
                'address' => $users->address,
                'quote' => $users->quote,
                'alt' => $users->alt,
                'portrait' => $users->portrait,
                'birthday' => $users->birthday,
                'token' => $token->plainTextToken
            )
        ]);
    }

    /**
     * Sign-Up User into the site.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signUp(Request $request)
    {
        $request->validate(Users::$rulesCreate, Users::$errorMessages);

        $data = $request->input();
        $data['password'] = Hash::make($data['password']);
        $user = Users::create($data);

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => $user->name . ", ¡Te registraste exitosamente!"
        ]);

    }

    /**
     * Do Logout User session and delete his token.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true
        ]);
    }


}
