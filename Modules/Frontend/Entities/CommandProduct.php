<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Stock\Entities\Product;

class CommandProduct extends Model
{
    use HasFactory;

    protected $table ='command_product';
    protected $fillable = [
        'command_id',
        'product_id',
        'quantity',
    ];

    protected static function newFactory()
    {
        return \Modules\Frontend\Database\factories\CommandProductFactory::new();
    }

}
