@extends('admin.index')
@section('header')
    @include('partials.adminHeader.index')
@endsection
@section('main')
    <main class="w-full h-full bg-[#fff]">
        <!-- <header class="flex w-full items-center justify-center h-[60px] bg-gray-100">
            <h2 class="text-xl font-medium mr-[50px]">Adimn {{session('user')}}</h2>
            <a class="text-red-600 font-medium ml-[50px] " href="{{ route('adminLogout') }}">Déconnexion</a>
        </header> -->
    </main>
@endsection

