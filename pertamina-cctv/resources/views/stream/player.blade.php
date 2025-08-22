<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Live CCTV - {{ $cctv->name }}</title>
	<style>
		body{background:#0b0b0b;color:#fff}
		.wrap{max-width:960px;margin:40px auto;padding:0 16px}
		video{width:100%;height:auto;background:#000;border-radius:8px}
		.toolbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px}
		.btn{display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border-radius:6px;background:#4f46e5;color:#fff;text-decoration:none}
	</style>
</head>
<body>
	<div class="wrap">
		<div class="toolbar">
			<h1 style="margin:0;font-size:18px;">{{ $cctv->name }}</h1>
			<a class="btn" href="javascript:history.back()">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
				<span>Kembali</span>
			</a>
		</div>
		<video id="player" controls autoplay playsinline></video>
		<p id="status" style="opacity:.8;margin-top:8px;font-size:13px;">Memulai stream…</p>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/hls.js@1.5.8/dist/hls.min.js"></script>
	<script>
		(function(){
			const url = "{{ $url }}";
			const video = document.getElementById('player');
			const statusEl = document.getElementById('status');

			function setStatus(text){ statusEl.textContent = text; }

			if (Hls.isSupported()) {
				const hls = new Hls({
					maxBufferLength: 8,
					lowLatencyMode: true,
					backBufferLength: 30,
				});
				hls.loadSource(url);
				hls.attachMedia(video);
				hls.on(Hls.Events.MANIFEST_PARSED, () => { setStatus('Live'); video.play().catch(()=>{}); });
				hls.on(Hls.Events.ERROR, function (event, data) {
					if (data.fatal) {
						switch (data.type) {
							case Hls.ErrorTypes.NETWORK_ERROR:
								setStatus('Jaringan bermasalah, mencoba ulang…');
								hls.startLoad();
								break;
							case Hls.ErrorTypes.MEDIA_ERROR:
								setStatus('Media error, recovery…');
								hls.recoverMediaError();
								break;
							default:
								setStatus('Kesalahan fatal pada stream');
								hls.destroy();
						}
					}
				});
			} else if (video.canPlayType('application/vnd.apple.mpegurl')) {
				video.src = url;
				video.addEventListener('loadedmetadata', function(){ setStatus('Live'); video.play().catch(()=>{}); });
			} else {
				setStatus('Browser tidak mendukung HLS');
			}
		})();
	</script>
</body>
</html>
