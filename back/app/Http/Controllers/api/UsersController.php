<?php

namespace App\Http\Controllers\api;

//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

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

        if($request->image) {
            $nameImg = date('YmdHis') . "." . $request->image->extension();
            $request->file('avatar')->move(public_path('/imgs/'), $nameImg);
            $data['image'] = $nameImg;
            if ($user->image !== 'avatar.png') {
                $oldImg = $user->image;
            }
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
