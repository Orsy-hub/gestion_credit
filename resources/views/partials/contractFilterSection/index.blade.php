<section class="border-b-2 py-2 px-3 flex  items-center justify-between">
  <h2 class="text-2xl font-medium">
    Mes contracts d'Emprunts
  </h2>
  <div x-data="{ open: false, selected: 'Plus récents' }" class="relative inline-block">
    <!-- Bouton de filtre -->
    <button 
        @click="open = !open" 
        class="border px-5 py-3 flex gap-2 rounded-lg transition-colors duration-300 hover:bg-slate-200"
    >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
        </svg>
        <span x-text="selected"></span> <!-- Affiche le texte sélectionné -->
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke-width="1.5" 
            stroke="currentColor" 
            class="size-6 transition-transform duration-300" 
            :class="open ? 'rotate-0' : 'rotate-180'"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
    </button>

    <!-- Menu de filtre par date -->
    <ul 
        x-show="open" 
        @click.outside="open = false"
        x-transition
        class="absolute w-[350px] p-5 translate-y-2 flex flex-col gap-3 border rounded-xl bg-white shadow-md"
    >
        <li 
            @click="selected = 'Plus récents'; open = false"
            class="cursor-pointer transition-colors duration-300 hover:bg-black/5 pl-2 py-1 rounded-lg"
        >
            <strong>Plus récents</strong>
        </li>
        <div class="h-[2px] w-full bg-slate-200"></div>
        <li 
            @click="selected = 'Plus anciens'; open = false"
            class="cursor-pointer transition-colors duration-300 hover:bg-black/5 pl-2 py-1 rounded-lg"
        >
            <strong>Plus anciens</strong>
        </li>
    </ul>
  </div>
</section>