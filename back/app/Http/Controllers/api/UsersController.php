<?php

namespace App\Http\Controllers\api;

//use App\Http\Controllers\Controller;
use App\Helpers\File;
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
            $nameAvatar = Str::slug($data['name']) . File::mimeToExtension($avatar->mime());
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




}
