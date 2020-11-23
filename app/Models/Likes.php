<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = [
		'like', 'user_id', 'movie_id', 'episode_id',
	];

	public function user()
    {
    	return $this->belongsTo(\App\models\Users::class, 'user_id', 'id');
    }

    public function movie()
    {
    	return $this->belongsTo(\App\models\Movies::class, 'movie_id', 'id');
    }

    public function episode()
    {
    	return $this->belongsTo(\App\models\Episodes::class, 'episode_id', 'id');
    }
}
