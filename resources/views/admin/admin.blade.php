<<<<<<< HEAD

@extends('admin.index')
@section('main')
    <main class="w-full h-full bg-[#fff]">
        <header class="flex w-full items-center justify-center h-[60px] bg-gray-100">
            <h2 class="text-xl font-medium mr-[50px]">Adimn {{session('user')}}</h2>
            <a class="text-red-600 font-medium ml-[50px] " href="{{ route('adminLogout') }}">Déconnexion</a>
        </header>
    </main>
@endsection
=======
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h2>Bienvenue, Raven</h2>
    <a href="{{ route('adminLogout') }}">Déconnexion</a>
</body>
</html>
>>>>>>> 95256a37cbf370e428d666628135246a1d321018
