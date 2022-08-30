<?php

namespace Modules\Frontend\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Stock\Entities\Product;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_id',
        'slug',
        'stauts_command',

    ];

    protected static function newFactory()
    {
        return \Modules\Frontend\Database\factories\CommandFactory::new();
    }


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}

