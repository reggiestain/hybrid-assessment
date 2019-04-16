<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\UserGroups;
use App\Notifications\PasswordResetNotification;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword,
        Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'surname', 'email', 'password', 'user_group_id',
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

    public function identities() {
        return $this->hasMany('App\Model\SocialIdentity');
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
