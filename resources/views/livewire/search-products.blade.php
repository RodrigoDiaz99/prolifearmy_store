
   
    <div x-data="inputSearch()" class="relative mb-4">
        <input x-on:keydown="iconReset = true"
      
        wire:model="search"
        placeholder="Introduzca el producto a buscar...""
            class="w-60 lg:w-96 px-2 py-1 border-2 focus:outline-none focus:border-indigo-400 text-gray-500 rounded-lg"
            name="message" placeholder="Search..."></input>
            @isset($producs)
            @foreach($producs as $item)
                <a href="{{ route('details.show', $item->id) }}" class="shadow mb-1 bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
                    <div class="flex flex-col w-full">
                        <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                            <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                                <div class="w-6 flex flex-col items-center">
                                    <div class="flex relative w-5 bg-orange-500 justify-center items-center m-1 mr-2 h-4 mt-1 rounded-full "><img class="rounded-full" alt="A" src="https://randomuser.me/api/portraits/men/62.jpg"> </div>
                                </div>
                                <div class="w-full items-center flex">
                                    {{ $item->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endisset
    </div>
   
@push('javascript')
    <script>
        function inputSearch() {
            return {
                iconReset: false,
                search: '',
            }
        }
    </script>
@endpush