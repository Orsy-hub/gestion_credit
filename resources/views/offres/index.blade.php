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
    
    {{-- Section d'action. C'est ici que nous pouvons filtrer les offres ou en creer de nouvelle. --}}
    @include('partials.offreActionSection.index')

    <div class="flex justify-center">
      <section class="max-w-3xl w-[50%] p-5 bg-white rounded-lg shadow-lg overflow-hidden flex flex-col gap-4">
        <div class="flex flex-col gap-3">
          <h2 class="text-xl font-semibold text-gray-800">
            Prêt pour projet immobilier
          </h2>
          <div class="flex flex-col gap-2">
            <p class="text-gray-600 text-base">Montant : <strong>50,000 €</strong></p>
            <p class="text-gray-600 text-base">Date limite : <strong>15 Mars 2025</strong></p>
            <p class="text-gray-600 text-base">Taux d'intérêt : <strong>5% fixe</strong></p>
            <p class="text-gray-600 text-base">Conditions : <strong>Remboursement sur 24 mois</strong></p>
            <p class="text-gray-600 text-base">Nom de l'emprunteur : <strong>Jean Dupont</strong></p>
            <p class="text-gray-600 text-base">Email de l'emprunteur : <strong class="text-blue-500">jean.dupont@example.com</strong></p>
          </div>
        </div>
        <div class="flex gap-3 font-ubuntu">
          <button class="flex items-center gap-3 px-4 py-2 text-white bg-red-600 rounded-lg transition-colors duration-300 hover:bg-red-800 active:bg-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
            Supprimer l'offre
          </button>
          <button class="flex items-center gap-3 px-4 py-2 text-white bg-blue-600 rounded-lg transition-colors duration-300 hover:bg-blue-800 active:bg-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
            Modifier l'offre
          </button>
        </div>
      </section>

    </div>
  </div>
</body>
</html>