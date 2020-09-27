<div class="bg-white px-4 sm:px-6 py-3 flex items-center justify-between shadow h-16 fixed top-0 left-0 right-0 z-50">
    <div class="flex items-center text-white">
        <img src="{{ asset('images/logo.png') }}" alt="Qemal Logo" class="logo">
        <span class="font-semibold text-sm sm:text-xl tracking-tight appname">Qemal Stafa HS MNS</span>
    </div>
    <div class="relative">
        @auth
            <div class="flex items-center cursor-pointer" id="opennavdropdown">
                <img class="w-8 h-8 rounded-full mr-2 theAvatar" src="{{ asset('images/profile/' . auth()->user()->profile_picture) }}" alt="Avatar">
                <p class="text-sm font-semibold leading-none headerLinks">{{ auth()->user()->name }}</p>
            </div>
            <div class="bg-blue-700 absolute top-0 right-0 mt-12 -mr-6 shadow rounded-bl rounded-br">
                <div class="hidden h-24 w-48" id="navdropdown">
                    <div class="px-8 py-4 border-t border-blue-800">
                        <a href="{{ route('profile') }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                            <span class="headerLinks">Profile</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="pb-2">
                            @csrf
                            <button class="flex items-center text-sm text-gray-200 font-semibold focus:outline-none" type="submit">
                                <span class="headerLinks">{{ __('Logout') }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else 
            <div class="flex items-center">
                @if (Route::has('login'))
                    <div>
                        <a class="flex items-center mr-4 text-sm text-gray-200 font-semibold" href="{{ route('login') }}">
                            <span class="headerLinks">Login</span>
                        </a>
                    </div>
                @endif
            </div>
        @endauth
    </div>
</div>