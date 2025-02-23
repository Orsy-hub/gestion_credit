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
  </div>
  <div class="">
    {{-- Section de bienvenu. --}}
    @include('partials.welcomeSection.index')
  </div>
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    @if(count($offres) > 0)
      <div class="flex flex-col gap-20 mt-10">
        @foreach($offres as $key => $value)
          @include('components.contract-card', [
              'offre' => $value
          ])
        @endforeach
      </div>
    @else
      <section class="w-full text-base h-[400px] rounded-xl bg-slate-100 text-slate-400 mt-10 flex flex-col justify-center items-center sm:text-2xl font-ubuntu font-bold">
        Aucun offres d'emprunt disponible.
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 text-red-400">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0 0 12.016 15a4.486 4.486 0 0 0-3.198 1.318M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
        </svg>
      </section>      
    @endif
    {{-- <code>
      <pre>
        {{ $offres }}
      </pre>
    </code> --}}
  </div>
</body>
</html>