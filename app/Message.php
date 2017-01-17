<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = [
        'description', 'to', 'from', 'item'
    ];
	
    public function user() {
        return $this->belongsTo('User');
    }
	
	public function item() {
        return $this->hasOne('Item');
    }
	
}
