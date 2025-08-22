<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Admin Panel - {{ config('app.name') }}</title>
		@vite(['resources/css/app.css','resources/js/app.js'])
	</head>
	<body class="font-sans antialiased">
		<div class="min-h-screen flex bg-gray-100 dark:bg-gray-900">
			<!-- Sidebar -->
			<aside class="w-72 bg-white/95 dark:bg-gray-800/95 backdrop-blur border-r border-gray-200 dark:border-gray-700 hidden md:flex md:flex-col">
				<div class="h-16 flex items-center gap-3 px-4 border-b border-gray-200 dark:border-gray-700">
					<img src="/Pertamina.png" class="w-8 h-8" alt="Pertamina" />
					<div>
						<div class="text-sm font-semibold">Platform</div>
						<div class="text-xs text-gray-500">Admin Panel</div>
					</div>
				</div>
				<nav class="p-4 space-y-2 overflow-y-auto">
					<a class="block px-3 py-2 rounded bg-indigo-600 text-white" href="{{ route('dashboard') }}">Dashboard</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Table</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.users.index') }}">Table User</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">User</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.users.index') }}">User List</a>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.users.create') }}">Create User</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Maps</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.buildings.index') }}">Maps List</a>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.buildings.create') }}">Create Maps</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Location</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.rooms.index') }}">Location List</a>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.rooms.create') }}">Create Location</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Contact</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.contacts.index') }}">Contact List</a>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.contacts.create') }}">Create Contact</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Notification</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="#">Notifications</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Message</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('chat.panel') }}">Messages</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Theme</div>
					<div class="flex gap-2 px-3 py-2">
						<button x-data @click="document.documentElement.classList.remove('dark')" class="px-2 py-1 border rounded">Light</button>
						<button x-data @click="document.documentElement.classList.add('dark')" class="px-2 py-1 border rounded">Dark</button>
						<button x-data @click="document.documentElement.classList.toggle('dark', window.matchMedia('(prefers-color-scheme: dark)').matches)" class="px-2 py-1 border rounded">System</button>
					</div>
				</nav>
			</aside>

			<!-- Content -->
			<main class="flex-1 min-w-0">
				@yield('content')
			</main>
		</div>
	</body>
</html>
