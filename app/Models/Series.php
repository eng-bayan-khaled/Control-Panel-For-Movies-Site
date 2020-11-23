<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $table = 'series';
    protected $fillable = [
		'title', 'description', 'release_date', 'poster_path', 
	];

	public function genres()
    {
        return $this->belongsToMany(\App\models\Genres::class, 'series-genre', 'series_id', 'genre_id');
    }

    public function tags()
    {
        return $this->belongsToMany(\App\models\Tags::class, 'series_tag', 'series_id', 'tag_id');
    }
}
