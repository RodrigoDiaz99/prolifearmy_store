<div class="fixed inset-0 bg-black bg-opacity-70 z-50 min-h-screen lg:hidden transition-opacity opacity-0 pointer-events-none"
         :class="{ 'opacity-100 pointer-events-auto': $parent.mobileMenu }">
    <div class="w-2/3 md:w-1/3 bg-primary min-h-screen absolute right-0 shadow py-4 px-8">
        <button class="absolute top-0 right-0 mt-4 mr-4" @click="$parent.mobileMenu = false">
            <img src="{{asset('images/icon-close.svg')}}" class="h-10 w-auto" alt="">
        </button>

        <ul class="flex flex-col mt-8">

            <li class="py-2">
                <a href="{{route('welcome')}}" class="font-header font-semibold text-white uppercase pt-0.5 cursor-pointer">Inicio</a>
            </li>

            <li class="py-2">
                <a href="{{route('shop')}}" class="font-header font-semibold text-white uppercase pt-0.5 cursor-pointer">Tienda</a>
            </li>

           

          
            @if (Route::has('login'))
                @auth
                <li class="py-2">
                    <a href="{{ url('dashboard') }}" class="font-header font-semibold text-white uppercase pt-0.5 cursor-pointer">Panel</a>
                </li>

                @else
                    <li class="py-2">
                        <a href="{{ route('login') }}" class="font-header font-semibold text-white uppercase pt-0.5 cursor-pointer">Acceder</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="py-2">
                            <a href="{{ route('register') }}" class="font-header font-semibold text-white uppercase pt-0.5 cursor-pointer">Registro</a>
                        </li>
                    @endif
                @endauth
            @endif

            <li class="py-2">
                <a href="{{route('cart')}}" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</div>
