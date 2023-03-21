<x-guest-layout title="Politicas de Privacidad">
    <div class="pt-4 bg-gray-100">

        <!-- component -->
        <!-- Display Container (not part of component) START -->
        <div class="m-10 mx-auto p-16 sm:p-24 lg:p-48 bg-gray-200">

            <!-- Carousel Body -->
            <div class="relative rounded-lg block md:flex items-center bg-gray-500 shadow-xl"
                style="min-height: 19rem;">
                <div class="relative w-full md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg"
                    style="min-height: 19rem;">
                    <img class="absolute inset-0 w-full h-full object-cover object-center" src="https://res.cloudinary.com/hfakqpuzy/image/upload/v1624517371/TOXIK_2_rspebx.png" alt="">
                    <div class="absolute inset-0 w-full h-full bg-gray-250 opacity-75"></div>

                </div>
                <div class="w-full md:w-3/5 h-full flex items-center bg-gray-100 rounded-lg">
                    <div class="p-12 md:pr-24 md:pl-16 md:py-12">
                        <p class="text-gray-600"><span class="text-gray-900">Politicas de Privacidad</span>
                            {!! $policy !!}
                            <span class="text-xs ml-1"></span>
                            </a>
                    </div>
                    <svg class="hidden md:block absolute inset-y-0 h-full w-24 fill-current text-gray-100 -ml-12"
                        viewBox="0 0 100 100" preserveAspectRatio="none">

                    </svg>
                </div>


            </div>

            <!-- Carousel Tabs -->


        </div>
        <!-- Display Container (not part of component) END -->
    </div>
</x-guest-layout>
