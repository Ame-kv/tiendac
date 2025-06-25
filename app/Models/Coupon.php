<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'discount', 'valid_until'];

    public function setNameAttributes($value) {
        $this->attributes['name'] = Str::upper($value); //para poner el cupon con letras mayusculas
    }

    public function checkIfValid() {
        if($this->valid_until > Carbon::now()) {      //carbon es metodo para que devuelva fecha y hora actual
            return true;
        } 
        else {
            return false;
        }
    }
}
