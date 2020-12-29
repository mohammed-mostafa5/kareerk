<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messages extends Model
{
    use SoftDeletes;

  /**
   * Table name.
   *
   * @var string
   */
  protected $table = 'messages';

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
  protected $fillable = [
    'user_id', 'to_id', 'subject', 'message', 'seen', 'important'
  ];


  public function sender()
  {
      return $this->belongsTo('App\Models\Users\User', 'user_id', 'id');
  }


  public function receiver()
  {
      return $this->belongsTo('App\Models\Users\User', 'to_id', 'id');
  }


}
