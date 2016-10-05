<?php

namespace App;

//use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
	// use Searchable;
	public function items()
	{
		return $this->hasMany(Item::class)->orderBy('updated_at', 'desc');
	}
        protected $fillable = [
        'name', 'comment', 'user_id'
    ];
}
