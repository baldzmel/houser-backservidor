<?php

namespace App\Http\Controllers\api;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetPasswords;


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

    public function sendPasswordResetLink(Request $request)
    {
        return $this->sendPasswordResetLink($request);
    }

    /**
     * Get the response for a successful password reset link.
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Se envió un email para que puedas restablecer tu contraseña.',
            'data' => $response
        ]);
    }

    /**
     * Get the response for a failed password reset link.
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'No se pudo enviar el mail al correo que proporcionaste']);
    }

    /**
     * Handle reset password
     * @param  \Illuminate\Http\Request  $request
     */
    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }

    /**
     * Reset the given user's password.
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
        event(new PasswordReset($user));
    }

    /**
     * Get the response for a successful password reset.
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Se cambió correctamente la contraseña']);
    }

    /**
     * Get the response for a failed password reset.
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Falló, credenciales inválidas']);
    }

}
