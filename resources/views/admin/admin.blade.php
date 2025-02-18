@extends('admin.index')
@section('header')
  @include('partials.adminHeader.index')
@endsection
@section('main')
  <main x-data="{ 
      activeTab: 'litiges',
      validationsCount: 3,
      litigesCount: 1,
      visitedSections: { validation: true, litiges: false }
    }" class="mx-auto max-w-7xl px-4 sm:px-6 bg-[#fff]">
    <section class="border-b-2 py-2 px-3 flex items-center justify-between">
      <h2 class="text-2xl font-medium">Dashboard</h2>
      {{-- Boutons. --}}
      <div class="relative flex gap-3">
        {{-- Bouton pour la section de validation. --}}
        <button 
          @click="activeTab = 'validation'; visitedSections.validation = true"
          class="relative border px-5 py-3 flex gap-2 text-blue-400 rounded-lg transition-colors duration-300 hover:bg-slate-200"
          :class="{ 'bg-slate-300': activeTab === 'validation' }"
        >
          {{-- Badge pour le nombre d'elements a valider. --}}
          <span 
            x-show="validationsCount > 0 && !visitedSections.validation" 
            x-text="validationsCount"
            class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full"
          >
          </span>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
          </svg>
          <strong class="font-normal">En attente de validation</strong>
        </button>
        {{-- Bouton pour la section de litiges --}}
        <button 
          @click="activeTab = 'litiges'; visitedSections.litiges = true"
          class="border px-5 py-3 flex gap-2 text-red-500 rounded-lg transition-colors duration-300 hover:bg-slate-200"
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
          <strong class="font-normal">Litiges</strong>
        </button>
      </div>
    </section>

    <!-- Sections -->
    <section x-show="activeTab === 'validation'" class="py-4">
        @include('components.vadation-card')
    </section>

    <section x-show="activeTab === 'litiges'" class="py-4">
        @include('components.litige-card')
    </section>
  </main>
@endsection
