<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillTranslation extends Model
{
    protected $table = 'skill_translations';

    protected $fillable = ['name'];

    public $timestamps = false;
}
