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

        // register
        'first_name',
        'last_name',
        'username',
        'code',
        'verify_code',
        'phone',
        'address',
        'email',
        'password',
        'email_verified_at',
        'photo',
        'identification',
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
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'address' => 'required',
        'identification' => 'required',
        'about_me' => '',
        'g-recaptcha-response'   => 'required',
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
    ################################### Appends #####################################
    #################################################################################

    protected $appends = ['photo_path'];

    public function getPhotoPathAttribute()
    {
        return $this->photo ? asset('uploads/images/original/' . $this->photo) : null;
    }

    public function getIdentificationAttribute()
    {
        return $this->attributes['identification'] ? asset('uploads/images/original/' . $this->attributes['identification']) : null;
    }

    #################################################################################
    ################################### Relations ###################################
    #################################################################################

    /**
     * Get all of the products for user in wishlist.
     */
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
    ################################### Functions ###################################
    #################################################################################

    /**
     * Grapping Wishlist Products.
     *
     */
    public function whishlistProduct()
    {
        if (isset(auth()->user()->wishlist)) {
            return auth()->user()->wishlist;
        }
        return array();
    }

    #################################################################################
    ############################## Accessors & Mutators #############################
    #################################################################################

    public function setPasswordAttribute($value)
    {
        if ($value) {
            // $this->attributes['password'] = bcrypt($value);
            $this->attributes['password'] = Hash::make($value);
        }
    }

    public function setPhotoAttribute($file)
    {
        try {
            if ($file) {

                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName);

                $this->attributes['photo'] = $fileName;
            }
        } catch (\Throwable $th) {
            $this->attributes['photo'] = $file;
        }
    }

    public function setIdentificationAttribute($file)
    {
        try {
            if ($file) {
                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName);

                $this->attributes['identification'] = $fileName;
            }
        } catch (\Throwable $th) {
            $this->attributes['identification'] = $file;
        }
    }

    public function getStatusAttribute()
    {
        return $this->attributes['status'] ? 'Active' : 'Inactive';
    }
}
