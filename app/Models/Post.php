<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = [
		'title',
		'body',
         ];

         public function comments() {
                 return $this->hasMany('App\Models\Comment');
         }

         public function user() {
         	return $this->belongsTo('App\User');
         }

}

