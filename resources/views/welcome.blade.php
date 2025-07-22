<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preload" href="{{ Vite::asset('resources/css/app.css') }}" as="style">
  @vite('resources/css/app.css')
  @livewireStyles
</head>
<body>
  <h1 class="text-7xl bg-red-500 font-bold underline">
    Hello world!
  </h1>
  
  @livewireScripts
</body>
</html>