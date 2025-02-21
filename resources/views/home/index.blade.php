<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @include('partials.importation.index')
  <title>{{ config('app.name') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
{{-- overflow-x-hidden --}}
<body class="antialiased pt-10 pb-16 md:pb-32 w-full ">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <!-- Entete du site. -->
    @include('partials.header.index')

    {{-- Section de bienvenu. --}}
    @include('partials.welcomeSection.index')
    
    <div class="flex flex-col gap-20 mt-10">
      @foreach($offres as $key => $value)
        @include('components.contract-card', [
            'offre' => $value
        ])
      @endforeach

    </div>
    {{-- <code>
      <pre>
        {{ $offres }}
      </pre>
    </code> --}}
  </div>
</body>
</html>