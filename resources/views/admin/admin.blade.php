@extends('admin.index')
@section('header')
  @include('partials.adminHeader.index' )
@endsection
@section('main')
  <main x-data="{ 
      activeTab: 'validation',
      validationsCount: {{ $validationCount }},
      litigesCount: 1,
      visitedSections: { validation: false, litiges: false }
<<<<<<< HEAD
    }" class="mx-auto max-w-7xl px-4 sm:px-6 bg-[#fff]">
    <section class="border-b-2 py-2 px-3 flex items-center justify-between">
      <h2 class="text-2xl font-medium">Dashboard</h2>
=======
    }" 
    class="mx-auto max-w-7xl px-4 sm:px-6 bg-[#fff]">
    <section class="border-b-2 py-2 sm:px-3 flex items-center justify-between ">
      <h2 class="sm:text-2xl font-medium hidden sm:block">Dashboard</h2>
>>>>>>> feature/responsif
      {{-- Boutons. --}}
      <div class="relative w-full flex justify-evenly sm:justify-end items-center sm:gap-3">
        {{-- Bouton pour la section de validation. --}}
        <button 
          @click="activeTab = 'validation'; visitedSections.validation = true"
          class="relative border px-5 py-3 flex flex-col sm:flex-row items-center gap-2 text-blue-400 rounded-lg transition-colors duration-300 hover:bg-slate-200"
          :class="{ 'bg-slate-300': activeTab === 'validation' }"
        >
          {{-- Badge pour le nombre d'elements a valider. --}}
          <span 
            x-show="validationsCount > 0 && !visitedSections.validation" 
            x-text="validationsCount"
            class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full"
          >
          </span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 sm:size-6">
            <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
          </svg>
          <strong class="font-normal w-max hidden sm:block">En attente de validation</strong>
          <strong class="font-normal w-max text-sm sm:hidden">Validations</strong>
        </button>
        {{-- Bouton pour la section de litiges --}}
        <button 
          @click="activeTab = 'litiges'; visitedSections.litiges = true"
          class="relative border px-5 py-3 flex flex-col sm:flex-row items-center gap-2 text-red-500 rounded-lg transition-colors duration-300 hover:bg-slate-200"
          :class="{ 'bg-slate-300': activeTab === 'litiges' }"
        >
          {{-- Badge pour le nombre de litiges en attentes. --}}
          <span 
            x-show="litigesCount > 0 && !visitedSections.litiges" 
            x-text="litigesCount"
            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full"
          >
          </span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
              <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
          </svg>        
          <strong class="font-normal text-sm sm:text-base">Litiges</strong>
        </button>
      </div>
    </section>

    <!-- Sections -->
    <section x-show="activeTab === 'validation'" class="py-4 flex flex-col gap-10">
      @if($validationCount === 0)
        <section class="w-full h-[400px] text-slate-400 text-2xl font-ubuntu font-bold flex flex-col gap-4 justify-center items-center">
          Aucun utilisateur en attente de validation
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-20 text-green-800">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
          </svg>
        </section>
      @else
        @foreach($usersNonVerifies as $key => $value)
          @include('components.vadation-card', [
            'user' => $value
          ])
        @endforeach
      @endif
    </section>

    <section x-show="activeTab === 'litiges'" class="py-4">
        @include('components.litige-card')
    </section>
  </main>
@endsection
