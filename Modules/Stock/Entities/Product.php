<?php

namespace Modules\Stock\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Frontend\Entities\Command;

class Product extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'slug',
        'status',
        'description',
        'category_id',
    ];
    protected $dates=['deleted_at'];

    protected static function newFactory()
    {
        return \Modules\Stock\Database\factories\ProductFactory::new();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function commands()
    {
        return $this->belongsToMany(Command::class);
    }

}
