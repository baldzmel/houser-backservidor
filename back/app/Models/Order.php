<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = "id_order";
    protected $fillable = ['fk_order_state', 'fk_service', 'fk_user', 'fk_houser', 'rating', 'user_message', 'houser_message', 'read_at'];

    public static function rulesCreate()
    {
        return [
            'user_message' => 'required|min:4'
        ];
    }

    /**
     * FK 'id_order_state' belongs To Orders_States
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_state()
    {
        return $this->belongsTo(OrderState::class);
    }

    /**
     * FK 'id_service' belongs To Service
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * FK 'fk_user' belongs To User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    /**
     * FK 'fk_houser' belongs To User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function houser()
    {
        return $this->belongsTo(Users::class);
    }
}
