<x-app-layout>

    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">

            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div class="relative px-4 py-10 bg-white text-center dark:bg-darker mb-4 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">

                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            <div
                                class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
                                SP</div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                <h2 class="leading-relaxed text-blue-500 uppercase dark:text-primary-light">Subir Promoción</h2>
                                <p class="text-sm text-black font-normal leading-relaxed">Llena este formulario para
                                    guardar una nueva promoción</p>
                            </div>
                        </div>


                            <form action="{{route('promotions.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                        <div class="flex flex-col">
                                            <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Titulo de la promoción</label>
                                            <input type="text" name="title" id="title" onkeyup="mayus(this);"
                                                style="text-transform: uppercase;"
                                                class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                                placeholder="Titulo de la promocion" required autofocus>
                                        </div>

                                        <div class="form-group row">
                                            <label for="product_id"
                                                class="col-md-4 col-form-label text-md-right text-blue-500 uppercase dark:text-primary-light">Producto</label>
                                            <div class="col-md-6">
                                                <select name="product_id" id="product_id"
                                                    class="px-4 py-2 border focus:ring-gray-500 border-blue-500 rounded-md focus:outline-none block w-full pl-10 mt-1 text-sm text-black">

                                                    <option value="" selected>Seleccione un producto</option>

                                                    @foreach ($products as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Descripción de la promoción</label>
                                            <input type="text" name="description" id="description" onkeyup="mayus(this);"
                                                style="text-transform: uppercase;"
                                                class="px-4 py-2 border focus:ring-gray-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                                placeholder="Descripcion de la promocion" required autofocus>
                                        </div>

                                        <div class="flex flex-col">
                                            <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Descuento</label>
                                            <input type="number" min="1" name="cash_discount" id="cash_discount"
                                                class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                                placeholder="35" required autofocus>
                                        </div>
                                        <div class="flex flex-col">
                                            <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Fecha de expiración de la promoción</label>
                                            <input type="date" min="1" name="expiration_date" id="expiration_date"
                                                class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600"
                                                placeholder="10" required autofocus>
                                        </div>

                                    </div>



                                <div class="pt-4 flex items-center space-x-4">

                                    <button type="submit"
                                        class="w-full flex-col bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-1 border border-blue hover:border-transparent rounded">
                                        <i class="fas fa-upload mx-2"></i>
                                        <span>Subir Promoción</span>
                                    </button>

                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('cover_file').onchange = function() {
            console.log(this.value);
            document.getElementById('coverRecive').innerHTML = document.getElementById('cover_file').files[0].name;
        }

    </script>
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

    </script>
</x-app-layout>
