<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class AccountBalance extends Model {

    protected $table = 'account_balance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balance',
    ];

}
