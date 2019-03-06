<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
     protected $table = 'user_groups';
     
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];
    
}
