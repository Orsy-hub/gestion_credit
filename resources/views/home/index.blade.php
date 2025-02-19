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
    <!-- Entete du site. -->
    @include('partials.header.index')

    {{-- Section de bienvenu. --}}
    <div class="relative flex flex-col items-center justify-center min-h-[60vh]">
      <!-- Image de fond -->
      <div class="absolute inset-0 bg-black/10">
        <img
          class="w-full h-full object-cover " 
          src="{{ asset('images/view-contract.jpg') }}" 
          alt="Consultation de contrats"
        >
      </div>
    
      <!-- Contenu principal -->
      <div class="relative z-10 max-w-3xl bg-white p-8 rounded-lg shadow-md text-center">
        <div class="flex items-center gap-5">
          <!-- Avatar -->
          <div class="relative w-[80px] h-[70px] rounded-full bg-slate-100 overflow-hidden">
            @if($user->image)
              <img class="w-full h-full object-cover" src="{{ asset('storage/'. Auth::user()->image) }}" alt="Photo de profil {{ Auth::user()->role }}">
            @else
              <span class="w-full h-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-[80px] text-gray-500">
                  <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                </svg>
              </span>
            @endif
          </div>
    
          <!-- Message de bienvenue -->
          <h1 class="text-3xl w-full text-center font-bold text-green-800">
            @if ($user->role === 'Bayeur')
                Bienvenue, {{ $user->name }} ! 💰
            @else
                Bienvenue, {{ $user->name }} ! 🤝
            @endif
          </h1>
        </div>
    
        <!-- Texte descriptif -->
        <p class="text-gray-700 mt-4">
          @if ($user->role === 'Bayeur')
              Gérez vos offres de prêts et trouvez des emprunteurs en toute confiance. 
              Maximisez vos profits en soutenant des projets sérieux !
          @else
              Explorez les offres de prêts et financez vos projets facilement. 
              Trouvez les meilleures conditions adaptées à vos besoins !
          @endif
        </p>
      </div>
    </div>
    

    @include('components.contract-card', [
        'image' => "",
        'title' => "Titre",
        'conditions' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex doloremque neque tenetur eum facilis in recusandae asperiores voluptatum animi autem quos molestiae vero sint, vel consectetur totam deleniti quas. Labore!",
        'montant' => 5000,
        'date' => "24/02/2025",
    ])
  </div>
</body>
</html>