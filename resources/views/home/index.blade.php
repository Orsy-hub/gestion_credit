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
    <div class="flex flex-col items-center justify-center min-h-[60vh] bg-gray-100">
      <div class="max-w-3xl bg-white p-8 rounded-lg shadow-md text-center">
        <div class="flex items-center gap-5">
          <div class="relative w-[80px] h-[70px] rounded-full bg-slate-100  overflow-hidden">
            <img class=" object-cover text-[10px] text-center" src="{{ asset('storage/'. Auth::user()->image) }}" alt="Photo de profil {{ Auth::user()->role }}">
          </div>
          <h1 class="text-3xl w-full text-center font-bold text-green-800">
              @if ($user->role === 'Bayeur')
                  Bienvenue, {{ $user->name }} ! 💰
              @else
                  Bienvenue, {{ $user->name }} ! 🤝
              @endif
          </h1>
        </div>

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