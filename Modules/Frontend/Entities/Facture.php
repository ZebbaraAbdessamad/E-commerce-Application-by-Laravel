<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'command_id',
        'total_amount',
        'quantity',
        'date_command',
    ];

    protected static function newFactory()
    {
        return \Modules\Frontend\Database\factories\FactureFactory::new();
    }

    public function command()
    {
        return $this->belongsTo(Command::class,'command_id');
    }
}
