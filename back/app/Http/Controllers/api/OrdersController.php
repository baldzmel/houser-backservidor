<?php

namespace App\Http\Controllers\api;

use Auth;
use Faker\Provider\UserAgent;
use App\Models\Order;
use App\Models\Rating;
use App\Models\OrderState;
use App\Models\Service;
use App\Models\Users;
use App\Http\Resources\Rating as RatingResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class OrdersController extends Controller
{
//    use Notifiable;


    /**
     * Return Orders By User (who is logged in).
     * @param $id
     * @return JsonResponse
     */
    public function OrdersByUser($id)
    {
        $ordersByUser = DB::table('orders')
            ->select('orders.id_order', 'houser.orders.fk_houser', 'houser.user.name', 'houser.user.lastname', 'houser.user.alt', 'houser.user.portrait', 'houser.user.telephone', 'houser.user.avatar', 'services.title', 'orders_states.state', 'orders.fk_order_state', 'orders.created_at', 'orders.user_message', 'orders.houser_message', 'orders.read_at')
            ->join('houser.user', 'orders.fk_houser', '=', 'houser.user.id_user')
            ->join('houser.services', 'orders.fk_service', '=', 'services.id_service')
            ->join('houser.orders_states', 'orders.fk_order_state', '=', 'orders_states.id_order_state')
            ->where('orders.fk_user', '=', $id)
            ->orderBy('orders.created_at', 'ASC')->get();

        return response()->json(['data' => $ordersByUser]);
    }


    /**
     * Mockapea Mensaje de Houser al Usuario
     * @param $fk_user
     * @param $fk_houser
     * @param $orderID
     */
    public function houserMsg($fk_user, $fk_houser, $orderID)
    {
        $getUserName = DB::table('user')
            ->select('name')
            ->where('id_user', '=', $fk_user)->get();

        $getHouserName = DB::table('user')
            ->select('name')
            ->where('id_user', '=', $fk_houser)->get();

        $notifyMsg = "Hola " . $getUserName[0]->name . ", mi nombre es: " . $getHouserName[0]->name . ". Voy a estar contactándome con vos por email o whatsapp brevemente para coordinar la visita";

        $query = DB::table('orders')
            ->where('id_order', $orderID)
            ->update(['houser_message' => $notifyMsg]);


    }

    /**
     * Generates Work Order and saves it in Database. Issues notification to the User.
     * @param Request $request
     * @return JsonResponse
     */
    public function requestOrder(Request $request)
    {
        $request->validate(Order::rulesCreate());

        $data = $request->all();
        $requestOrder = Order::create($data);
        $orderID = $requestOrder->id_order;

        $queryNameHouser = DB::table('user')
            ->select('name')
            ->where('id_user', '=', $request->get('fk_houser'))->get();

        $nameHouser = $queryNameHouser[0]->name;

        $respuesta = $this->houserMsg($data['fk_user'], $data['fk_houser'], $orderID);

        return response()->json([
            'success' => true,
            'data' => $requestOrder,
            'messageBody' => "Ya contactaste al Houser",
            'messageTitle' => $nameHouser . " se pondrá en contacto con vos"
        ]);
    }


    /**
     * Updates Orders Status
     * @param $id_order
     * @param $status
     * @return JsonResponse
     */
    public function updateStatus($id_order, $status)
    {
        DB::table('orders')
            ->where('id_order', $id_order)
            ->update(['fk_order_state' => $status]);

        return response()->json([
            'success' => true,
            'message' => "Se modificó el Estado de la Orden de Solicitud"
        ]);
    }

    /**
     * Updates Read Date of the Order (Message)
     * @param $id_order
     * @return JsonResponse
     */
    public function updateReadMsg($id_order)
    {
        DB::table('orders')
            ->where('id_order', $id_order)
            ->update(['read_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => "Mensaje Leído"
        ]);
    }


    /**
     * Rating Completed Order.
     * @param Request $request
     * @return JsonResponse
     */
    public function setRatingOrder(Request $request)
    {

        $data = $request->all();
        $requestRating = Rating::create($data);


        return response()->json([
            'success' => true,
            'data' => $requestRating,
            'message' => "¡Valoraste al Houser y a su trabajo exitosamente!"
        ]);

    }

/*     public function getRating($id)
    {
        $query = DB::table('rating')
            ->select('id_rating', 'fk_user', 'fk_order', 'rating')
            ->where('id_rating', '=', $id)->get();

        return response()->json([
            'data' => $query
        ]);
    } */

}
