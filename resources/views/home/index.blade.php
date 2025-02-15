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

    @include('components.contractCard', [
        'image' => "",
        'title' => "Titre",
        'conditions' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex doloremque neque tenetur eum facilis in recusandae asperiores voluptatum animi autem quos molestiae vero sint, vel consectetur totam deleniti quas. Labore!",
        'montant' => 5000,
        'date' => "24/02/2025",
    ])

  </div>
</body>
</html>