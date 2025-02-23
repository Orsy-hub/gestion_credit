<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('partials.importation.index')
  <title>{{ config('app.name') }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased pt-10 pb-16 md:pb-32">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    {{-- Entete du site. --}}
    @include('partials.header.index')
    
    @if(session('success'))
      <p class="bg-green-900 text-white p-3 my-5 font-ubuntu rounded-xl">{{ session('success') }}</p>
    @endif
    {{-- Section d'action. C'est ici que nous pouvons filtrer les offres ou en creer de nouvelle. --}}
    @include('partials.offreActionSection.index')

    <div class="flex flex-col items-center gap-10">
      @if($offres->isEmpty())
        <section class="w-full h-[500px] text-slate-500 sm:text-2xl font-ubuntu font-bold flex flex-col justify-center items-center">
          <p>Aucune offre disponible</p>
          <p>Veillez en créer</p>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 sm:size-20 text-green-800">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Z" />
          </svg>
        </section>
      @else
        @foreach($offres as $offre)
          @include('components.offre-card', [
            'id' => $offre->id,
            'bayeur_id' => $offre->bayeur_id,
            'bayeur_nom' => $offre->bayeur->name,
            'titre' => $offre->titre,
            'montant' => $offre->montant,
            'date_offre' => $offre->date_offre,
            'date_limite' => $offre->date_limite,
            'taux_interet' => $offre->taux_interet,
            'conditions' => $offre->conditions,
          ])
        @endforeach
      @endif
    </div>
  </div>
</body>
</html>