<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $fillable = [
		'title', 'description', 'release_date', 'duration', 'poster_path',
	];

	public function actors()
    {
        return $this->belongsToMany(\App\models\Actors::class, 'movie-actor', 'movie_id', 'actor_id');
    }

    public function genres()
    {
        return $this->belongsToMany(\App\models\Genres::class, 'movie-genre', 'movie_id', 'genre_id');
    }

    public function tags()
    {
        return $this->belongsToMany(\App\models\Tags::class, 'movie_tag', 'movie_id', 'tag_id');
    }
}
