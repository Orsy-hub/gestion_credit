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
        <p>Aucune offre disponible.</p>
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