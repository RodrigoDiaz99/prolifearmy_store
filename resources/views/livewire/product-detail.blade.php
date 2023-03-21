<div class="lg:w-4/5 mx-auto flex flex-wrap">
    <img alt="ecommerce" class="object-cover object-center rounded border border-gray-200"
        src="{{ Storage::url($productos->img_paths) }}">
    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">

        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $productos->name }}
        </h1>

        <p class="leading-relaxed">dfgdfgdfgdfg{{ $productos->description }}</p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex">
                <span class="mr-3">Color</span>
                <button
                    class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
                <button
                    class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
                <button
                    class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"></button>
            </div>
            <div class="flex ml-6 items-center">
                <span class="mr-3">Size</span>
                <div class="relative">
                    <select
                        class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                        <option>SM</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                    </select>
                    <span
                        class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4"
                            viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6"></path>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="flex">
            <span
                class="title-font font-medium text-2xl text-gray-900">${{ $productos->inventories['0']->sale_price }}</span>
            <a
                class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded">Agregar
                al Carrito</a>
            <button
                class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-5 h-5" viewBox="0 0 24 24">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                    </path>
                </svg>
            </button>
        </div>
        <!-- comment form -->

       @if (Auth::check())
       <form action="{{ route('storeComment') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Agregar un nuevo comentario</h2>
        <div class="w-full md:w-full px-3 mb-2 mt-2">
            <textarea
                class="bg-white rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-black focus:outline-none focus:bg-white"
                name="comment" id="comment" placeholder='Escribe tu comentario' required></textarea>
            <input type="text" id="product_id" name="product_id" value="{{ $productos->id }}"
                hidden>
            <p class="leading-relaxed"></p>
        </div>
        <div class="w-full flex items-start md:w-full px-3">
            <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">

            </div>
            <div class="-mr-1">
                <input type='submit'
                    class="flex ml-auto text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded"
                    value='Publicar comentario'>
            </div>
        </div>
    </form>
       @else
sadasdas
       @endif












        <!--comments-->
        @foreach ($comment_products as $row)
            <div>

                <section class="rounded-b-lg  mt-4 ">



                    <div id="task-comments" class="pt-4">
                        <!--     comment-->
                        <div
                            class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                            <div class="flex flex-row justify-center mr-2 border-black">
                                <img alt="avatar" width="48" height="48"
                                    class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4"
                                    src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
                                <h3
                                    class="text-blue-600 font-semibold text-lg text-center md:text-left ">
                                    @ {{ $row->user->first_name }}</h3>


                            </div>


                            <p style="width: 90%"
                                class="text-gray-600 text-lg text-center md:text-left ">
                                {{ $row->comment }}. </p>
                                <div>
                                    <p
                                    class="text-blue-600 font-semibold text-x1 text-center md:text-left ">
                                    {{ $row->created_at }}</p>
                                </div>
                        </div>

                    </div>
                </section>

            </div>

        @endforeach
    </div>
</div>

