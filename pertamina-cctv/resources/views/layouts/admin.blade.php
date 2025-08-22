<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Admin Panel - {{ config('app.name') }}</title>
		@vite(['resources/css/app.css','resources/js/app.js'])
		@fluxStyles
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
					<a class="block px-3 py-2 rounded bg-indigo-600 text-white" href="{{ route('dashboard') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
							<span>Dashboard</span>
						</span>
					</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Table</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.users.index') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 6.75h15m-15 5.25h15m-15 5.25h15"/></svg>
							<span>Table User</span>
						</span>
					</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">User</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.users.index') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9 9 0 1 0-6 0M12 10.5v6"/></svg>
							<span>User List</span>
						</span>
					</a>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.users.create') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15"/></svg>
							<span>Create User</span>
						</span>
					</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Maps</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.buildings.index') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7.5 9 4.5l6 3 6-3v12l-6 3-6-3-6 3z"/></svg>
							<span>Maps List</span>
						</span>
					</a>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.buildings.create') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15"/></svg>
							<span>Create Maps</span>
						</span>
					</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Location</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.rooms.index') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 3.75h16.5v16.5H3.75zM9 9h6v6H9z"/></svg>
							<span>Location List</span>
						</span>
					</a>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.rooms.create') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15"/></svg>
							<span>Create Location</span>
						</span>
					</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Contact</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.contacts.index') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75 12 12l9.75-5.25M3 17.25h18"/></svg>
							<span>Contact List</span>
						</span>
					</a>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.contacts.create') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15"/></svg>
							<span>Create Contact</span>
						</span>
					</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Notification</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.notifications') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.25 18.75a2.25 2.25 0 1 1-4.5 0"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 9.75a7.5 7.5 0 1 1 15 0c0 3.81 1.5 4.5 1.5 4.5H3s1.5-.69 1.5-4.5z"/></svg>
							<span>Notifications</span>
						</span>
					</a>
					<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Message</div>
					<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('chat.panel') }}">
						<span class="inline-flex items-center gap-2">
							<svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.5 6.75h15v9.75H7.5L4.5 18.75z"/></svg>
							<span>Messages</span>
						</span>
					</a>
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
				@if (session('success'))
					<div class="p-4">
						<div class="rounded border border-emerald-200 bg-emerald-50 text-emerald-800 px-4 py-2">{{ session('success') }}</div>
					</div>
				@endif
				@if (session('error'))
					<div class="p-4">
						<div class="rounded border border-red-200 bg-red-50 text-red-800 px-4 py-2">{{ session('error') }}</div>
					</div>
				@endif
				@yield('content')
			</main>
		</div>
		<x-footer />
		@fluxScripts
	</body>
</html>
