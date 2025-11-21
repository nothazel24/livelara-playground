<nav class="w-full bg-white shadow-sm">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-center h-16">
            <a href="/" class="text-xl font-bold tracking-wide text-slate-800">
                {{ config('app.name') }}
            </a>

            <ul class="flex items-center gap-4">
                <x-navigation.nav-link href="/" :active="request()->routeIs('home.main')">Home</x-navigation.nav-link>
                <x-navigation.nav-link href="/students" :active="request()->routeIs('home.students')">Students</x-navigation.nav-link>
                <x-navigation.nav-link href="/docs/">Docs</x-navigation.nav-link>
            </ul>
        </div>
    </div>
</nav>
