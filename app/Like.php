<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model {

	return $this->belongsTo('App\Post');
    
}
