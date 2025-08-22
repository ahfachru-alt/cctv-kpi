<nav class="space-y-2">
	<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('dashboard') }}">Dashboard</a>
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
	<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('admin.notifications') }}">Notifications</a>
	<div class="text-xs uppercase tracking-wide text-gray-500 mt-4">Message</div>
	<a class="block px-3 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700" href="{{ route('chat.panel') }}">Messages</a>
</nav>