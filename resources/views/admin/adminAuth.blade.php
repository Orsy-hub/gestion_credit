<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
</head>
<body>
    @extends('admin.index')
    @section('titre')
        Connexion
    @endsection
    @section('main')
        <main class="h-full w-full">
            @if ($errors->any())
                <p style="color: red;">{{ $errors->first() }}</p>
            @endif

        <form action="{{ route('adminAuth') }}" method="POST" class=" w-full h-[800px] flex items-center justify-center rounded-lg">
            @csrf
            <div class="flex-col w-2/3 bg-gray-100 px-28 py-20">
                <div class="transition-colors duration-300 hover:bg-slate-200 rounded-full p-2 sm:p-0 sm:rounded-none sm:hover:bg-none mt-0 flex items-center justify-center">
                    <a href="#" class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-[50px] w-[50px] text-gray-700">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z" />
                        </svg>
                        <span class="hidden sm:block text-gray-600 text-5xl">{{ config('app.name') }}</span>
                    </a>
                </div>
                <div class="flex-col mt-7">
                    <span class="font-bold text-2xl mt-5">Authentification</span>
                    <div class="mt-[15px]">
                        <label for="username" class="block">Nom d'admin :</label>
                        <input class="w-full h-[50px] rounded-lg" type="text" name="username" required>
                    </div>
                    <div class="mt-[10px]">
                        <label for="password" class="block">Mot de passe :</label>
                        <input class="w-full h-[50px] rounded-lg" type="password" name="password" required>
                    </div>
                    <button type="submit" class=" px-4 py-2 bg-black text-white rounded-lg mt-4">Se connecter</button>
                    <p class="mt-[30px]">Authentifiez-vous pour avoir accès au tableau de bord de l'administrateur</p>
                </div>
            </div>
        </form>
        </main>
    @endsection

