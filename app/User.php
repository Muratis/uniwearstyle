<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public function user_cart()
    {
        return $this->belongsTo('App\Models\Carts','cart_id', 'cart_id');
    }

}
