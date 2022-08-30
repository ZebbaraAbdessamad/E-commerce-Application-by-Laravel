<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'method_delivery',
        'description',
        'sepecified_address',

    ];

    protected static function newFactory()
    {
        return \Modules\Frontend\Database\factories\DeliveryFactory::new();
    }


    public function command(){
        return $this->belongsTo(Command::class);
    }
}
