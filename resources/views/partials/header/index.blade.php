<div class="mb-10">
  <header class=" flex items-center justify-between text-slate-900">
    <div class="transition-colors duration-300 hover:bg-slate-200 rounded-full p-2 sm:p-0 sm:rounded-none sm:hover:bg-white">
      <a href="{{ route('home') }}" class="flex gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z" />
        </svg>
        <strong class="hidden sm:block">{{ config('app.name') }}</strong>
      </a>
    </div>
    <form action="" class="border-b hidden sm:flex sm:items-center">
      <input 
        type="search" 
        name="search" 
        id="search" 
        placeholder="Recherhcer un contract"
        class="border-none border-b"
        />
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </form>
    <div class="flex items-center gap-10">
      <button class="flex items-center gap-2 text-red-400 active:text-red-800">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
        </svg>
        <span class="relative after:absolute after:bottom-0 after:left-0 after:w-full after:h-1 after:bg-red-400 after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
          <em class="not-italic ">
            deconnexion
          </em>
        </span>
      </button>
      <div x-data="{ open: false }">
        <!-- Bouton du menu -->
        <button @click="open = !open" class="border-2 px-2 py-2 rounded-lg transition-colors duration-300 hover:bg-slate-200 active:bg-slate-100">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>

        <!-- Section latérale du menu -->
        <div x-show="open" x-transition class="absolute border top-5 right-2 w-[400px] h-[700px] z-20 p-5 bg-slate-100 shadow-md rounded-lg">
          <span class="flex justify-end">
            <button @click="open = false" class="text-slate-900 transition-colors duration-300 hover:text-slate-600 active:text-slate-100">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
            </button>
          </span>
          <nav class="mt-10">
            <ul class="flex flex-col gap-3">
              <a @click="open = false" href="{{ route('home') }}" class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <strong class="relative after:absolute after:w-full after:h-1 after:bg-black after:bottom-0 after:left-0 after:rounded-full after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
                  Accueil
                </strong>
              </a>
              <a @click="open = false" href="{{ route('contracts') }}" class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>
                <strong class="relative after:absolute after:w-full after:h-1 after:bg-black after:bottom-0 after:left-0 after:rounded-full after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
                  Contracts d'emprunt
                </strong>
              </a>
              <a @click="open = false" href="{{ route('offres') }}" class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                <strong class="relative after:absolute after:w-full after:h-1 after:bg-black after:bottom-0 after:left-0 after:rounded-full after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
                  Mes offres
                </strong>
              </a>
            </ul>
          </nav>
        </div>
        <div x-show="open" @click="open = false" class="absolute w-full h-full bg-black/35 top-0 cursor-pointer left-0 z-10"></div>
      </div>
    </div>
  </header>
</div>