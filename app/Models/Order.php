<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'payment_id', 'email','phone','name','items','qty','address','amount','status'
    ];
    
    public function user() {
        return $this->belongsTo('App\Modes\User');
    }
    
    public function address() {
        return $this->belongsTo('App\Modes\Address');
    }
}
