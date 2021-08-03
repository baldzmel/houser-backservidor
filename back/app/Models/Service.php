<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $primaryKey = "id_service";
    protected $fillable = ['title', 'img'];

    /** @var array validation rules. */
    public static $rules = [
        'service' => 'required|min:4',
    ];
    /** @var array error Messages. */
    public static $errorMessages = [
        'title.required' => 'El nombre del servicio no puede quedar vacío.',
        'title.min' => 'El nombre del servicio debe tener al menos :min caracteres.'
    ];


    /**
     * FK 'id_user' belongs To Service
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(Users::class);
    }




}
