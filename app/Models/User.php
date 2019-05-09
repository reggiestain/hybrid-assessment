<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\UserGroups;
use App\Notifications\PasswordResetNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements  MustVerifyEmail {

    use 
        Notifiable;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'surname', 'email','password', 'user_group_id','email_verified_at','verified','verification_token','remember_token'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_groups() {
        return $this->belongsTo(UserGroups::class);
    }
    
    public function orders() {
        return $this->hasMany('App\Modes\Order');
    }

    public function identities() {
        return $this->hasMany('App\Models\SocialIdentity');
    }

    /**
     * Overriding the exiting sendPasswordResetNotification so that I can customize it
     *
     * @var array
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new PasswordResetNotification($token));
    }

    /**
     * Return user group
     * 
     * @return int
     */
    public function isAdmin() {
        return $this->user_group_id;
    }

}
