<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Episodes extends Model
{
    use HasFactory;
    protected $table = 'episodes';
    protected $fillable = [
		'title', 'summary', 'duration', 'season_id',
	];

	public function season()
    {
    	return $this->belongsTo(\App\models\Seasons::class, 'season_id', 'id');
    }

}
