<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerTranslation extends Model
{

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'career_translations';

    /**
     * Primary key.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Fillable fields.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'brief'];

    /**
     * Timestamps.
     *
     * @var boolean
     */
    public $timestamps = false;
}
