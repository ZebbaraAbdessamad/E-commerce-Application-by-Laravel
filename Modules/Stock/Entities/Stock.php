<?php

namespace Modules\Stock\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'quantity',
        'product_id',
        'status',
    ];
    protected $dates=['deleted_at'];

    protected static function newFactory()
    {
        return \Modules\Stock\Database\factories\StockFactory::new();
    }


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
