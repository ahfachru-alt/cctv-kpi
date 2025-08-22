<div class="p-4">
	<div class="flex items-center gap-3 mb-3">
		<input type="text" wire:model.live="search" placeholder="Cari Gedung..." class="border rounded px-3 py-2 w-64">
		<div class="flex items-center gap-2">
			<button class="w-4 h-4 rounded-full bg-green-600" wire:click="$set('statusFilter','online')" title="CCTV Online"></button>
			<button class="w-4 h-4 rounded-full bg-red-600" wire:click="$set('statusFilter','offline')" title="CCTV Offline"></button>
			<button class="w-4 h-4 rounded-full bg-yellow-500" wire:click="$set('statusFilter','maintenance')" title="Maintenance"></button>
			<button class="px-2 py-1 text-sm border rounded" wire:click="$set('statusFilter','all')">Semua</button>
		</div>
	</div>

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
	<div id="map" class="w-full h-[70vh] rounded shadow"></div>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
	<script>
		document.addEventListener('livewire:navigated', initMap);
		document.addEventListener('DOMContentLoaded', initMap);
		let map;
		function initMap(){
			if(document.getElementById('map').dataset.ready){ return; }
			map = L.map('map').setView([-6.3675, 108.4115], 15);
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);
			// Satellite layer via Esri (public)
			const satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', { attribution: 'Tiles © Esri'});
			const osm = map.hasLayer(satellite) ? satellite : null;
			const baseMaps = { "OpenStreetMap": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'), "Satelit": satellite };
			L.control.layers(baseMaps, {}).addTo(map);
			document.getElementById('map').dataset.ready = 1;
			renderMarkers(@js($buildings));
		}

		$wire.on('refreshMap', () => {
			renderMarkers(@js($buildings));
		});
		Livewire.hook('morph.updated', () => {
			renderMarkers(@js($buildings));
		});

		let markersGroup;
		function renderMarkers(buildings){
			if(markersGroup){ map.removeLayer(markersGroup); }
			markersGroup = L.layerGroup().addTo(map);
			buildings.forEach(b => {
				if(!b.latitude || !b.longitude) return;
				const buildingMarker = L.marker([b.latitude, b.longitude]).addTo(markersGroup).bindPopup(`<b>${b.name}</b>`);
				buildingMarker.on('click', () => {
					map.setView([b.latitude, b.longitude], 18);
					b.cctvs.forEach(c => {
						const color = c.status === 'online' ? 'green' : (c.status === 'offline' ? 'red' : 'yellow');
						const icon = L.divIcon({ className: 'cctv-icon', html: `<span style=\"display:inline-block;width:12px;height:12px;border-radius:50%;background:${color}\"></span>` });
						L.marker([b.latitude + (Math.random()-0.5)/1000, b.longitude + (Math.random()-0.5)/1000], { icon }).addTo(markersGroup).bindPopup(`<div class='space-y-2'>
							<div><b>${c.name}</b> - <span class='capitalize'>${c.status}</span></div>
							<a class='inline-flex items-center gap-2 px-3 py-1 rounded bg-indigo-600 text-white' href='${`/stream/${c.id}`}' target='_blank'>Live</a>
						</div>`);
					});
				});
			});
		}
	</script>
</div>
