<main class="mb-12">
    <ul class="p-8">
        @if(Auth::id() != null)
        @php
            $total = 0;
        @endphp
            @forelse ($shoppingItems as $item)
                <li class="flex bg-white p-5 rounded-lg shadow-lg mb-5">
                    <img src="{{ Storage::url($item->products->img_paths) }}" alt="{{ Storage::url($item->products->name) }}" class="w-32"/>
                    <div class="flex-grow flex flex-col md:flex-row items-center justify-center md:justify-between">
                        <p class="title font-semibold text-sm md:text-lg mb-5 md:mb-0 md:pl-5">{{ $item->products->name }}</p>
                        <p class="title font-semibold text-sm md:text-lg mb-5 md:mb-0 md:pl-5">${{ $item->products->inventories->first()->sale_price}}</p>
                        <div class="flex">
                            <button wire:click="ItemRest({{ $item->products->id }})" class="fa fa-minus rounded-lg bg flex justify-center items-center p-3 z-10">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <input type="number" value="{{ $item->quantity }}" class="text-center text-md font-semibold p-2 rounded w-20 focus:outline-none" readonly/>
                            <button wire:click="ItemSum({{ $item->products->id }})" class="fa fa-plus rounded-lg bg flex justify-center items-center p-3 z-10">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                        </div>
                        <p class="value font-bold text-sm mt-5 md:mt-0">${{ $item->subtotal }}</p>
                        @php
                            $total = $total + $item->subtotal
                        @endphp
                    </div>
                </li>
                @empty
                <h2>Carrito Vacío!</h2>
            @endforelse
            <footer class="flex flex-row px-8 py-1 bottom-0 w-full z-50">
                <div class="w-full flex items-center">
                    <p class="title font-semibold text-sm mr-2">Total:</p>
                    <p class="text-lg font-bold">${{ $total }}</p>
                </div>

                <div class="flex text-center bg-primary text-white hover:text-yellow rounded-md">
                    <a href="{{route('checkout')}}" class="flex w-full px-10 py-3">
                        <span class="font-bold">Checkout</span>

                        <svg class="w-6 h-6 fill-current ml-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M455.988,192c-13.048,0-23.704,10.472-23.992,23.456l-7.608,60.832L380.676,320h-27.608l21.288-25.536
                                        c6.68-8.016,8.424-19.024,4.544-28.72c-3.552-8.888-11.272-15.336-20.656-17.264c-9.368-1.912-19.016,0.968-25.784,7.736
                                        l-82.128,82.128c-1.504,1.496-2.344,3.536-2.344,5.656v96v32c0,4.416,3.584,8,8,8h128c4.416,0,8-3.584,8-8v-32
                                        c0-4.416-3.584-8-8-8h-8v-20.688l93.656-93.656c1.336-1.336,2.16-3.104,2.32-4.992L479.988,216
                                        C479.988,202.768,469.22,192,455.988,192z M375.988,464h-112v-16h112V464z M456.26,308.416l-93.928,93.928
                                        c-1.504,1.496-2.344,3.536-2.344,5.656v24h-96v-84.688l79.792-79.792c3-3,7.112-4.232,11.256-3.376
                                        c4.152,0.848,7.44,3.6,9.008,7.528c1.696,4.232,0.936,9.04-1.984,12.536l-32.216,38.664c-1.992,2.384-2.416,5.704-1.104,8.512
                                        c1.32,2.816,4.144,4.616,7.248,4.616h48c2.12,0,4.16-0.84,5.656-2.344l48-48c1.256-1.256,2.064-2.896,2.28-4.664l8-64
                                        c0.048-0.328,0.064-0.656,0.064-0.992c0-4.408,3.592-8,8-8c4.408,0,8,3.592,8.024,7.336L456.26,308.416z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M229.644,338.344l-82.136-82.136c-6.768-6.776-16.4-9.656-25.784-7.736c-9.376,1.928-17.096,8.376-20.656,17.272
                                        c-3.872,9.696-2.136,20.696,4.552,28.72L126.908,320H99.3l-43.712-43.712l-7.608-60.832C47.692,202.472,37.036,192,23.988,192
                                        c-13.232,0-24,10.768-23.976,24.664l8,96c0.16,1.888,0.976,3.656,2.32,4.992l93.656,93.656V432h-8c-4.416,0-8,3.584-8,8v32
                                        c0,4.416,3.584,8,8,8h128c4.416,0,8-3.584,8-8v-32v-96C231.988,341.88,231.148,339.84,229.644,338.344z M215.988,464h-112v-16h112
                                        V464z M215.988,432h-96v-24c0-2.12-0.84-4.16-2.344-5.656l-93.928-93.928L15.988,216c0-4.408,3.592-8,8-8s8,3.592,8,8
                                        c0,0.336,0.016,0.664,0.064,0.992l8,64c0.216,1.768,1.024,3.408,2.28,4.664l48,48c1.496,1.504,3.536,2.344,5.656,2.344h48
                                        c3.104,0,5.928-1.8,7.248-4.608c1.32-2.816,0.888-6.136-1.104-8.512l-32.216-38.664c-2.92-3.504-3.68-8.304-1.992-12.536
                                        c1.576-3.936,4.864-6.68,9.016-7.536c4.136-0.864,8.256,0.376,11.256,3.376l79.792,79.792V432z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M232.492,93.192c1.144-3.024,4.072-5.192,7.496-5.192c4.408,0,8,3.592,8,8h16c0-10.416-6.712-19.216-16-22.528V56h-16
                                        v17.472c-9.288,3.312-16,12.112-16,22.528c0,2.12,0.84,4.16,2.344,5.656l29.152,29.152c-1.144,3.024-4.072,5.192-7.496,5.192
                                        c-4.408,0-8-3.592-8-8h-16c0,10.416,6.712,19.216,16,22.528V168h16v-17.472c9.288-3.312,16-12.112,16-22.528
                                        c0-2.12-0.84-4.16-2.344-5.656L232.492,93.192z"/>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M415.988,16h-38.864H102.852H63.988c-4.416,0-8,3.584-8,8v38.864v98.264V200c0,4.416,3.584,8,8,8h38.864h274.264h38.872
                                        c4.416,0,8-3.584,8-8v-38.864V62.864V24C423.988,19.584,420.404,16,415.988,16z M71.988,32h24c0,13.232-10.768,24-24,24V32z
                                        M71.988,192v-24c13.232,0,24,10.768,24,24H71.988z M407.988,192h-24c0-13.232,10.768-24,24-24V192z M407.988,152
                                        c-22.056,0-40,17.944-40,40h-256c0-22.056-17.944-40-40-40V72c22.056,0,40-17.944,40-40h256c0,22.056,17.944,40,40,40V152z
                                        M407.988,56c-13.232,0-24-10.768-24-24h24V56z"/>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </footer>
        @else
            <small class="text-red-400">Inicia Sesión, Para poder ver tu carrito!</small>
            <a href="{{ route('login') }}" class="flex w-full mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Iniciar Sesión
            </a>

            <a href="{{ route('register') }}" class="flex w-full mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Regístrate
            </a>
        @endif
    </ul>
</main>

