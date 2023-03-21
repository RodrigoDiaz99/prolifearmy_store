<!-- component -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Muchas peticiones</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script src="//code.tidio.co/hgr8jru4lx01fco2dqtfmdgkpjg6tq1i.js"></script>
<style type="text/css">
      .text-9xl{
      font-size: 14rem;
      }
      @media(max-width: 645px){
      .text-9xl{
      font-size: 5.75rem;
      }
      .text-6xl{
      font-size: 1.75rem;
      }
      .text-2xl {
      font-size: 1rem;
      line-height: 1.2rem;
      }
      .py-8 {
      padding-top: 1rem;
      padding-bottom: 1rem;
      }
      .px-6 {
      padding-left: 1.2rem;
      padding-right: 1.2rem;
      }
      .mr-6{
      margin-right: 0.5rem;
      }
      .px-12 {
      padding-left: 1rem;
      padding-right: 1rem;
      }
      }
    </style>
</head>
<body>
<div class="bg-gradient-to-r from-blue-100 to-blue-900">
<div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
<div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
<div class="border-t border-gray-200 text-center pt-8">
<h1 class="text-9xl font-bold text-blue-400">429</h1>
<h1 class="text-6xl font-medium py-8">oops! Muchas Peticiones</h1>
<p class="text-2xl pb-8 px-12 font-medium">Oops! La página tiene muchas peticiones</p>
<a href="{{route('welcome')}}" class="bg-gradient-to-r from-blue-100 to-blue-900 hover:from-blue-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
Inicio
</a>

</div>
</div>
</div>
</div>
</body>
</html>
