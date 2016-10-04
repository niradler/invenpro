<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
	public function items()
	{
		return $this->hasMany(Item::class);
	}
        protected $fillable = [
        'name', 'comment', 'user_id'
    ];
}
