<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Live CCTV - {{ $cctv->name }}</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/video.js@8.16.1/dist/video-js.min.css">
    <style> body{background:#0b0b0b;color:#fff} .wrap{max-width:960px;margin:40px auto;padding:0 16px}</style>
</head>
<body>
	<div class="wrap">
		<h1>{{ $cctv->name }}</h1>
		<video-js id="player" class="vjs-default-skin vjs-16-9" controls autoplay preload="auto" data-setup='{}'>
			<source src="{{ $url }}" type="application/x-mpegURL" />
		</video-js>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/video.js@8.16.1/dist/video.min.js"></script>
</body>
</html>
<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
</div>
