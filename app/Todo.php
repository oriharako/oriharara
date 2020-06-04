<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
public function users()
{
  return $this->belongsTo('App\User');
}
}
