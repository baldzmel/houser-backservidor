<?php

namespace App\Http\Controllers\api;

//use App\Http\Controllers\Controller;
use App\Helpers\File;
use App\Mail\codePassword;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Mail;

class UsersController extends Controller
{
    /**
     * Show User's Profile.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showProfile($id) {

        $user = Users::findOrFail($id);

        return response()->json(['data' => $user]);

    }

    /**
     * Edit User profile data.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function editProfile(Request $request, $id) {

        $request->validate(Users::$errorMessages);

        $user = Users::findOrFail($id);
        $data = $request->all();

        if(!empty($data['avatar'])){
            $avatar = Image::make($data['avatar']);
            $nameAvatar = date('YmdHis') . File::mimeToExtension($avatar->mime());
            $data['avatar'] = $nameAvatar;
            $avatar->fit(100, 100, function($constraint){
                $constraint->upsize();
            })->save(public_path('/imgs/' . $nameAvatar));
        }


        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);

        if(isset($oldImg) && !empty($oldImg)) {
            unlink(public_path('/imgs/' . $oldImg));
        }

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => "Tus datos han sido actualizados con éxito."
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function codeVerifyPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = Users::where('email', $request->email)->first();

        if (!$user){
            return response()->json([
                'message' => 'Usuario inexistente',
                'status_code' => 401
            ], 401);

        } else{

            $random = rand(111111, 999999);
            $user->verification_code = $random;
            $user->save();

            $correo = new codePassword($random);
            Mail::to('no-reply@houser.com')->send($correo);

            return response()->json([
                'message' => 'Email enviado con éxito',
                'status_code' => 200
            ], 200);

        }
    }

    public function setNewPassword(Request $request)
    {
        /*  dd(request()->all()); */

        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|integer',
            'password' => 'required|min:6'
        ]);

        $user = Users::where('email', $request->email)->where('verification_code', $request->verification_code)->first();

        /* dd($user); */
        if (!$user){

            return response()->json([
                'message' => 'Código/Usuario inválido',
                'status_code' => 401
            ], 401);

        } else{

            $user->password =  Hash::make( $request->password );
            $user->verification_code = null;
            $user->save();


            return response()->json([
                'message' => 'Se cambió tu contraseña',
                'status_code' => 200
            ], 200);

        }


    }




}
