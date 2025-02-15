<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @include('partials.importation.index')
  <title>{{ config('app.name') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased pt-10 pb-16 md:pb-32">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Entete du site -->
    @include('partials.header.index')
  </div>
</body>
</html>