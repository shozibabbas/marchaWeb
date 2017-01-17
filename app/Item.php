<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Item extends Model
{
	protected $fillable = [
        'name', 'description', 'location', 'category', 'user', 'worth', 'paymentAllowed', 'itemStatus'
    ];
	
    public function category() {
        return $this->belongsTo('App\Category');
    }
	
	public function user() {
        return $this->belongsTo('App\User');
    }
}
