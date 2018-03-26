<?php

namespace App;

use Illuminate/Database/Eloquent/Model;

class Post extends Model {
    
    protected $fillable = ['title', 'content'];

    public function likes() {

    	return $this->hasMany('All\Like', 'post_id');
    }

    public function tags() {

    	return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function setTitleAttribute($value) {
    	$this->attibutes['content'] = strtolower($value);
    }

}