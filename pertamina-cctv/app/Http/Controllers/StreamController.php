<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cctv;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LoginNotification;

class StreamController extends Controller
{
    public function hls(Cctv $cctv)
    {
        $storagePath = storage_path('app/public/streams/'.$cctv->id);
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0775, true);
        }

        $playlist = $storagePath.'/index.m3u8';

        if (!file_exists($playlist)) {
            // Spawn ffmpeg to create HLS segments in background
            $rtsp = $cctv->rtsp_url;
            $cmd = sprintf(
                'ffmpeg -rtsp_transport tcp -i %s -c:v libx264 -preset veryfast -tune zerolatency -g 48 -keyint_min 48 -sc_threshold 0 -c:a aac -f hls -hls_time 2 -hls_list_size 5 -hls_flags delete_segments+append_list -hls_allow_cache 0 %s > /dev/null 2>&1 &',
                escapeshellarg($rtsp),
                escapeshellarg($playlist)
            );
            exec($cmd);

            // Simple notification: inform current user a stream is starting (placeholder for dedicated StreamStartedNotification)
            if (auth()->check()) {
                auth()->user()->notify(new LoginNotification());
            }
        }

        $publicUrl = asset('storage/streams/'.$cctv->id.'/index.m3u8');
        return view('stream.player', ['url' => $publicUrl, 'cctv' => $cctv]);
    }
}
