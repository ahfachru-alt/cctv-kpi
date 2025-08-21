<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
	protected $fillable = [
		'building_id', 'room_id', 'name', 'rtsp_url', 'status', 'ip_address', 'meta',
	];

	protected $casts = [
		'meta' => 'array',
	];

	public function building()
	{
		return $this->belongsTo(Building::class);
	}

	public function room()
	{
		return $this->belongsTo(Room::class);
	}
}
