<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Contact extends Model
{
    use HasFactory;
    public $fillable = ['email', 'message'];

    // public static function boot() {
    //     parent::boot();
    //     static::created(function ($item) {
    //     $adminEmail = "zebbaraabdessamad@gmail.com";
    //     Mail::to($adminEmail)->send(new ContactMail($item));
    //     });
    // }
}
