<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    use HasFactory;
    protected $table = 'actors';
    protected $fillable = [
		'name', 'role', 'country', 'DateOfBirth', 'description', 'icon_path',
	];


	public function movies()
    {
        return $this->belongsToMany(\App\models\Movies::class, 'movie-actor', 'actor_id', 'movie_id');
    }
}
