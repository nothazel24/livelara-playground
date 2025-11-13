<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">
            {{ config('app.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                {{-- cara mengakses x-component blade "x-namafolder(jika ada*)-file" --}}
                <x-navigation.nav-link href="/" :active="request()->routeIs('home.main')">Home</x-navigation.nav-link>
                <x-navigation.nav-link href="/students" :active="request()->routeIs('home.students')">Students</x-navigation.nav-link>
            </ul>

            {{-- login section --}}
            {{-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary me-3">Logout</button>
                </form>
                @if (!Auth::user())
                    <x-nav-link href="/login">Login</x-nav-link>
                @endif
            </ul> --}}
        </div>
    </div>
</nav>