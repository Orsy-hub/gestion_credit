@extends('admin.index')
@section('title')
    Acceuil
@endsection
@section('main')
    <div class="h-full w-full text-center">
            <a href="{{route('login')}}" class="bg-green-600 px-4 py-2 rounded-lg">Connexion</a>
            <a href="{{route('register')}}" class="bg-blue-600 px-4 py-2 rounded-lg">Créer compte</a>
    </div>
@endsection