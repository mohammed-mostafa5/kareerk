<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use Notifiable, SoftDeletes, ImageUploaderTrait;

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'password',
        'country_id',
        'userable_id',
        'userable_type',
        'email_verified_at',
        'subscription',
        'approved_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * The attributes that should be Validations for arrays.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ];

    #################################################################################
    ############################## JWT Configration #################################
    #################################################################################
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    #################################################################################
    ################################### Relations ###################################
    #################################################################################

    /**
     * Get the owning userable model.
     */
    public function userable()
    {
        return $this->morphTo();
    }

    public function favourites()
    {
        return $this->belongsToMany('App\Models\Product', 'user_favourites', 'user_id', 'product_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'user_id', 'id');
    }

    public function bidItems()
    {
        return $this->belongsToMany('App\Models\Product', 'product_user', 'user_id', 'product_id')->withPivot(['id', 'value', 'created_at', 'updated_at']);
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\UserTransactions', 'user_id', 'id');
    }



    #################################################################################
    ############################## Accessors & Mutators #############################
    #################################################################################

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function getStatusAttribute()
    {
        return $this->attributes['status'] ? 'Active' : 'Inactive';
    }
}
