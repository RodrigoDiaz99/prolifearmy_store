
<x-app2-layout>
    <style>
        .header-section,
button {
  background-color: #415cc7;
}

input {
  background: #F5F5F5;
  margin: 0 -10px;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
    </style>
    <div class="bg-center bg-cover bg-no-repeat relative py-8" ">

        <div class="bg-center bg-cover bg-no-repeat absolute inset-0 z-20 bg-gradient-to-r from-hero-gradient-from to-hero-gradient-to">
        </div>

        <div class="pt-20">

        </div>
    </div>
    <body class="w-full h-full bg-gray-100">

        <!--  section 1  -->
         @livewire('shopping-cart')

        </body>
</x-app2-layout>


