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

    public function scopeOnline($q)
    {
        return $q->where('status', 'online');
    }

    public function scopeOffline($q)
    {
        return $q->where('status', 'offline');
    }

    public function scopeMaintenance($q)
    {
        return $q->where('status', 'maintenance');
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'online' => 'green',
            'offline' => 'red',
            'maintenance' => 'yellow',
            default => 'gray',
        };
    }
}
