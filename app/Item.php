<?php

namespace App;

//use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	 //use Searchable;
            protected $fillable = [
        'name', 'comment', 'inven_id'
    ];
}
