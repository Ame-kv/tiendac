<?php

namespace App\Models;

use Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'approved', 'rating', 'product_id'];

    public function user(){
        return $this->belongsTo(User::class); //belongsTo es método uno a uno
    }

    public function produtc(){
        return $this->belongsTo(Product::class);

    }

    public function getCreatedAttribute($value){
        return Carbon::parse($value)->diffForHumans(); //diffForHumans metodo que devuelve la fecha de creacion y fecha actual de forma legible
    }
}
