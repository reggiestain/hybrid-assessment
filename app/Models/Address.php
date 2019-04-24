<?php

namespace App\Models;

use App\Models\Adress;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street_name', 'street_number', 'city','post_code','province','country',
    ];
    
    public function user() {
        return $this->hasMany('App\Modes\Order');
    }
}
