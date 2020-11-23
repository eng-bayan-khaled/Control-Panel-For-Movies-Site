<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seasons extends Model
{
    use HasFactory;
    protected $table = 'seasons';
    protected $fillable = [
		'summary', 'season_number', 'duration', 'series_id', 'poster_path',
	];

	public function series()
    {
    	return $this->belongsTo(\App\models\Series::class, 'series_id', 'id');
    }

    public function actors()
    {
        return $this->belongsToMany(\App\models\Actors::class, 'season-actor', 'season_id', 'actor_id');
    }

}
