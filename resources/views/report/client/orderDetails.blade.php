<x-app-layout>
    <div class="p-4">
        <div class="w-full overflow-hidden rounded-lg">
            <div class="w-full overflow-x-auto font-semibold tracking-wide text-left bg-white rounded-md dark:bg-darker mt-4 mb-4">
                <div class="text-center mt-3">
                    <h1 class="text-4xl">¡Bienvenido {{ Auth::user()->first_name }}! </h1>
                    <p class="text-center font-italic">En esta sección vez los datos de este pedido
                </div>

                <div class="w-full overflow-hidden tracking-wide text-left shadow-xs bg-white rounded-md dark:bg-darker mt-4 mb-4">
                    <div class="w-full overflow-x-auto">
                        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white rounded-md dark:bg-darker mt-4 mb-4">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Nombre </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Apellidos</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Teléfono </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Pais </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Estado </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Ciudad </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Calle </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Numero Exterior </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Numero Interior </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Colonia </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Codigo Postal </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Referencia </th>
                                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Tipo de envio </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white rounded-md dark:bg-darker mt-4 mb-4 ">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->name }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->last_name }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->phone }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->country }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->state }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->city }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->street }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->number_exterior }}</div>
                                        </td>

                                        @if($row->number_interior == null)
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm font-semibold">N/A</div>
                                            </td>
                                        @else
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm font-semibold">{{ $row->number_interior }}</div>
                                            </td>
                                        @endif

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->suburb }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->zip }}</div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                            <div class="text-sm font-semibold">{{ $row->reference }}</div>
                                        </td>

                                        @if($row->shipping = 50)
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm font-semibold">Estandar {{ $row->shipping }}</div>
                                            </td>
                                        @elseif($row->shipping = 150)
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm font-semibold">Express {{ $row->shipping }}</div>

                                            </td>
                                        @else
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm font-semibold">Gratis {{ $row->shipping }}</div>
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="w-full overflow-hidden tracking-wide text-left shadow-xs bg-white rounded-md dark:bg-darker mt-4 mb-4">
                    <div class="w-full overflow-x-auto">
                        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white rounded-md dark:bg-darker mt-4 mb-4">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Producto </th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Cantidad</th>
                                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 uppercase dark:text-primary-light">
                                            Subtotal </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white rounded-md dark:bg-darker mt-4 mb-4 ">
                                    @foreach($producto as $value => $row2)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm font-semibold">{{$row2->product->first()->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm font-semibold">{{$row2->quantity }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                                <div class="text-sm font-semibold">${{$row2->subtotal }}</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
