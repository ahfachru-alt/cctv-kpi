<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
	protected $fillable = [
		'name', 'latitude', 'longitude', 'address',
	];

	public function rooms()
	{
		return $this->hasMany(Room::class);
	}

	public function cctvs()
	{
		return $this->hasMany(Cctv::class);
	}
}