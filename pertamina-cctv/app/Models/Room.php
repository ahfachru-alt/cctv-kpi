<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	protected $fillable = [
		'building_id', 'name', 'floor',
	];

	public function building()
	{
		return $this->belongsTo(Building::class);
	}

	public function cctvs()
	{
		return $this->hasMany(Cctv::class);
	}
}
