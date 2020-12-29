<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    
    /**
     * Table name.
     * 
     * @var string
     */
    protected $table = 'category_translations';

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
    protected $fillable = ['name'];

    /**
     * Timestamps.
     * 
     * @var boolean
     */
    public $timestamps = false;
}
