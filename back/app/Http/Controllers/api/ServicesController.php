<?php

namespace App\Http\Controllers\api;

use App\Models\Service;
use App\Models\Users;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Bring/Get the list of all services
     * @return JsonResponse
     */
    public function getAllServices()
    {
        $services = Service::all();

        return response()->json([
            'data' => $services
        ]);
    }


    /**
     * Bring/Get the list of all services
     * @return JsonResponse
     */
    public function bringServiceById($id)
    {
        $service = Service::find($id);

        return response()->json([
            'data' => $service
        ]);
    }

    /**
     * Bring/Get Housers by Service.
     * @param $id
     * @return JsonResponse
     */
    public function showHousersByService($id)
    {
        $query = DB::table('user')
            ->select('id_user', 'name', 'lastname', 'avatar', 'quote', 'portrait')
            ->where('fk_level', '=', '3')
            ->where('fk_service', '=', $id)->get();

        return response()->json(['data' => $query]);

    }


}
