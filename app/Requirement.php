<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
	protected $fillable = [
        'name', 'description', 'user'
    ];
	
    public function user() {
        return $this->belongsTo('User');
    }
}
