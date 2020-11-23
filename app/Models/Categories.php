<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
		'name', 'parent_id',
	];

	public function parents()
    {
    	return $this->hasMany(\App\models\Categories::class, 'id', 'parent_id');
    }
}
