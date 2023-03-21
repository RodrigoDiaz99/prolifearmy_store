<x-app2-layout>
    <div class="bg-center bg-cover bg-no-repeat relative py-8" ">

        <div class=" bg-center bg-cover bg-no-repeat absolute inset-0 z-20 bg-gradient-to-r from-hero-gradient-from
        to-hero-gradient-to">
    </div>

    <div class="pt-20">

    </div>
    </div>

    <body class="bg-grey-lighter font-wp-pusher antialiased">
        <style>
            a {
                text-decoration: none;
                color: #22292f;
            }

            .outline-0 {
                outline: 0;
            }

            .lh-fix {
                line-height: 0.75;
            }

            .font-wp-pusher {
                font-family: Lato, -apple-system, Helvetica Neue, sans-serif;
            }

            .bg-blue-wp-pusher {
                background-color: #1179bf;
            }

            .bg-green-wp-pusher {
                background-color: #038e7d;
            }

            .border-blue-wp-pusher {
                border-color: #1179bf;
            }

            .text-blue-wp-pusher {
                color: #1179bf;
            }

            .max-w-wp-pusher {
                max-width: 56rem;
            }

            .text-5\.5xl {
                font-size: 4.125rem;
            }

            .ml-10 {
                margin-left: 2.5rem;
            }

            .mb-10 {
                margin-bottom: 2.5rem;
            }

            .mb-16 {
                margin-bottom: 4rem;
            }

            .mx-16 {
                margin: 0 4rem;
            }

            .p-10 {
                padding: 2.5rem;
            }

            .pt-10 {
                padding-top: 2.5rem;
            }

            .w-1\/2-almost {
                width: 48%;
            }

            .w-3\/4 {
                width: 75%;
            }

            @media (min-width: 768px) {
                .md\:ml-10 {
                    margin-left: 2.5rem;
                }

                .md\:w-1\/2-almost {
                    width: 48% !important;
                }
            }

        </style>
        <div class="checkout max-w-wp-pusher mx-auto">
            <div class="panel flex flex-col md:flex-row mb-8 shadow-lg">
                <div class="panel-left w-full md:w-2/3 bg-white rounded-l">
                    <form action="{{ route('delivery.store') }}" method="POST">
                        @csrf
                        <h1 class="text-3xl font-normal p-10 border-b border-solid border-grey-light">Checkout</h1>
                        <div class="p-10 pt-8 border-b border-solid border-grey-light">
                            <div class="flex items-center mb-4">
                                <div
                                    class="border-2 border-solid border-blue-wp-pusher py-2 px-3 rounded-full font-bold mr-2 text-blue-wp-pusher">
                                    1</div>
                                <h2 class="text-lg">Metodo de envio</h2>
                            </div>

                            <div class="flex flex-wrap">
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($ShoppingCart as $item)
                                    @php
                                        $total = $total + $item->subtotal;
                                    @endphp
                                @endforeach


                                @if($total >= 750)
                                    <div class="w-3/4">
                                        <button
                                            class="mt-6 flex items-center justify-between w-full bg-white rounded-md border p-4 focus:outline-none">
                                            <label class="flex items-center">
                                                <input name="shipping" id="shipping" type="radio" class="form-radio h-5 w-5 text-blue-600" value="0" checked><span class="ml-2 text-sm text-gray-700">Envio Gratis</span>
                                            </label>

                                            <span class="text-gray-600 text-sm">$0.0 MXN</span>
                                        </button>
                                    </div>
                                @else
                                    <div class="w-3/4 md:w-1/2-almost mb-4 md:mb-0">
                                        <label for="name" class="block text-sm mb-2">Tipos de Envío
                                            <select name="shipping" id="shipping"
                                                class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0"
                                                required>
                                                <option value="" selected>SELECCIONE UN TIPO DE ENVÍO</option>

                                                <option value="50">Estándar $50.00 MXN (5-10 dias)</option>
                                                <option value="150">Express $150.00 MXN (1-2 dias)</option>
                                            </select>
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="p-10 pt-8 border-b border-solid border-grey-light">
                            <div class="flex items-center mb-4">
                                <div
                                    class="border-2 border-solid border-blue-wp-pusher py-2 px-3 rounded-full font-bold mr-2 text-blue-wp-pusher">
                                    2</div>
                                <h2 class="text-lg">Informacion de contacto</h2>
                            </div>

                            <div class="flex flex-wrap">
                                <div class="w-3/4 md:w-1/2-almost mb-4 md:mb-0">
                                    <label for="name" class="block text-sm mb-2">Nombre(s)</label>
                                    <input id="name" type="text" name="name"
                                        class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0"
                                        required>
                                </div>
                                <div class="w-3/4 md:w-1/2-almost mb-4 ml-0 md:ml-4">
                                    <label for="last_name" class="block text-sm mb-2">Apellidos</label>
                                    <input id="last_name" name="last_name" type="text"
                                        class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0"
                                        required>
                                </div>
                                <div class="w-3/4">
                                    <label for="phone" class="block text-sm mb-2">Numero</label>
                                    <input id="phone" name="phone" type="number" minlength="10" maxlength="10" min="0"
                                        pattern="^[0-9]+"
                                        class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0"
                                        required
                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>
                            </div>
                        </div>

                        <div class="p-10 pt-8 border-b border-solid border-grey-light">
                            <div class="flex items-center mb-4">
                                <div
                                    class="border-2 border-solid border-blue-wp-pusher py-2 px-3 rounded-full font-bold mr-2 text-blue-wp-pusher">
                                    3</div>
                                <h2 class="text-lg">Datos de envio</h2>
                            </div>

                            <div class="flex flex-wrap">
                                <div class="w-3/4 md:w-1/2-almost mb-4 md:mb-0">
                                    <label for="name" class="block text-sm mb-2">Pais
                                        <select name="country" id="country"
                                            class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0" required>
                                            <option value="" selected>SELECCIONE UN PAIS</option>

                                            <option value="MÉXICO">MÉXICO</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="w-3/4 md:w-1/2-almost mb-4 ml-0 md:ml-4">
                                    <label for="statee" class="block text-sm mb-2">Estado</label>
                                    <input id="state" name="state" type="text"
                                        class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0"
                                        required>
                                </div>

                                <div class="w-3/4 md:w-1/2-almost mb-4 md:mb-0">
                                    <label for="city" class="block text-sm mb-2">Municipio</label>
                                    <input id="city" name="city" type="text"
                                        class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0"
                                        required>
                                </div>

                                <div class="w-3/4 md:w-1/2-almost mb-4 ml-0 md:ml-4">
                                    <label for="street" class="block text-sm mb-2">Dirección/Calle</label>
                                    <input id="street" name="street" type="text" class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0" required>
                                </div>


                                <div class="w-3/4 md:w-1/2-almost mb-4 md:mb-0">
                                    <label for="number_exterior" class="block text-sm mb-2">Número Exterior</label>
                                    <input id="number_exterior" name="number_exterior" type="text" class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0" required>
                                </div>

                                <div class="w-3/4 md:w-1/2-almost mb-4 ml-0 md:ml-4">
                                    <label for="city" class="block text-sm mb-2">Número interior (opcional)</label>
                                    <input id="number_interior" name="number_interior" type="text" class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0">
                                </div>

                                <div class="w-3/4 md:w-1/2-almost mb-4 md:mb-0">
                                    <label for="number_exterior" class="block text-sm mb-2">Colonia</label>
                                    <input id="suburb" name="suburb" type="text" class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0" required>
                                </div>

                                <div class="w-3/4 md:w-1/2-almost mb-4 ml-0 md:ml-4">
                                    <label for="city" class="block text-sm mb-2">Codigo Postal </label>
                                    <input id="zip" name="zip" type="number" maxlength="6" min="0" pattern="^[0-9]+"
                                        class="w-full text-sm bg-grey-light text-grey-darkest rounded px-3 py-3 outline-0"
                                        required
                                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>

                                <div class="w-3/4">
                                    <label class="block uppercase tracking-wide text-gray-700 font-bold mb-2"
                                        for="reference">
                                        REFERENCIA
                                        <textarea id="reference" name="reference" required
                                            class="px-4 py-2 focus:ring-gray-500 w-full sm:text-sm border-blue-500 focus:outline-none text-gray-600 resize-none border rounded-md"></textarea>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="p-10 pt-8 border-b border-solid border-grey-light">
                            <div class="flex items-center mb-4">
                                <div
                                    class="border-2 border-solid border-blue-wp-pusher py-2 px-3 rounded-full font-bold mr-2 text-blue-wp-pusher">
                                    4</div>
                                <h2 class="text-lg">Lista productos</h2>
                            </div>
                            @foreach ($ShoppingCart as $item)
                                <div class="grid grid-cols-1 sm:grid-cols-6 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6 gap-4">
                                    <div class="col-span-2 sm:col-span-1 xl:col-span-1">
                                        <img alt="product_img" src="{{ Storage::url($item->products->img_paths) }}" class="h-15 w-15 rounded  mx-auto"/>
                                    </div>

                                    <div class="col-span-2 sm:col-span-4 xl:col-span-4">
                                        <h3 class="font-semibold text-black">{{ $item->products->name }}</h3>
                                        <p>
                                            {{ $item->products->description }}
                                        </p>
                                        X {{ $item->quantity }}
                                    </div>

                                    <div class="col-span-2 sm:col-span-1 xl:col-span-1 italic">${{ $item->products->inventories->first()->sale_price }}</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="p-10 pt-8">
                            <!--<input type="text" id="priceDelivery">-->
                            <button type="submit" id="priceDelivery" class="bg-green-wp-pusher text-white w-full rounded px-4 py-4 mb-6 text-lg hover:bg-green-dark">Ir a pagar ${{ $total }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).on('change', '#shipping', function(event) {
            $('#priceDelivery').html("Ir a pagar ${{ $total }} + $" + $('#shipping').val());
        });
    </script>
</x-app2-layout>
