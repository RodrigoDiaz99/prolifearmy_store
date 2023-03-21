<x-app-layout>

    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">

            <div class="relative py-3 sm:max-w-xl sm:mx-auto ">
                <div class="relative px-4 py-10 bg-white text-center dark:bg-darker mb-4 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">

                    <div class="max-w-md mx-auto">
                        <div class="flex items-center space-x-5">
                            <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">
                                SP</div>
                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                <h2 class="leading-relaxed text-blue-500 uppercase dark:text-primary-light">Crear voucher</h2>
                                <p class="text-sm text-black font-normal leading-relaxed">Llena este formulario para
                                    guardar un nuevo voucher/p>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200 ">
                            <form action="{{ route('voucher.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                <div class="flex flex-col">
                                    <label class="leading-loose text-blue-500 uppercase dark:text-primary-light">Gastos</label>
                                    <input type="number" min="1" name="expense" id="expense" step="0.01" class="px-4 py-2 border focus:ring-gray-500 focus:border-green-500 w-full sm:text-sm border-blue-500 rounded-md focus:outline-none text-gray-600" placeholder="100" required autofocus>
                                </div>

                                

                        </div>
                        <div class="pt-4 flex items-center space-x-4">

                            <button type="submit" class="w-full flex-col bg-transparent hover:bg-blue-400 text-blue-500 font-semibold hover:text-white py-2 px-1 border border-blue hover:border-transparent rounded">
                                <i class="fas fa-upload mx-2"></i>
                                <span>Crear reporte</span>
                            </button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>