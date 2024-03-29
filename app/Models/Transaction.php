<?php

namespace App\Models;

use App\Helpers\MixCaseULID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'items',
        'item_total',
        'subtotal',
        'discount',
        'total',
        'payment',
        'status',
    ];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->code = MixCaseULID::generate();
        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'items' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }
}
