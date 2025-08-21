<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl space-y-4">
                    <h2 class="text-lg font-medium">Appearance</h2>
                    <div class="flex gap-2">
                        <button x-data @click="document.documentElement.classList.remove('dark')" class="px-3 py-2 border rounded">Theme Light</button>
                        <button x-data @click="document.documentElement.classList.add('dark')" class="px-3 py-2 border rounded">Theme Dark</button>
                        <button x-data @click="document.documentElement.classList.toggle('dark', window.matchMedia('(prefers-color-scheme: dark)').matches)" class="px-3 py-2 border rounded">Theme System</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>