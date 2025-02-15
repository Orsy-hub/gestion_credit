<div class="space-y-10 md:space-y-16">
  <article class="flex flex-col lg:flex-row lg:gap-10 lg:p-8 pb-8 md:pb-16 border-b">
    <div class="lg:w-[700px] lg:h-[300px] flex items-center justify-center flex-col gap-2 bg-slate-100 transition-colors duration-300 hover:bg-slate-300 p-5 cursor-pointer rounded-xl">
      <div class="bg-slate-600 w-[80px] h-[80px] flex justify-center items-center rounded-full text-white text-xl">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>
      </div>
      <strong class="text-xl">
        Kami
      </strong>
    </div>
    <section class=" flex flex-col justify-between pb-5">
        <h1 class="relative w-min font-bold font-viga text-slate-900 text-3xl lg:text-5xl leading-tight cursor-pointer after:absolute after:bottom-0 after:left-0 after:w-full after:h-1 after:bg-slate-900 after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
          {{ $title }}
        </h1>
      <p class="text-slate-500 font-ubuntu">
        {{ $conditions }}
        
      </p>
      <div class="flex justify-between font-poppins">
        <span>
          Montant de l'emprunt :&nbsp;
          <strong class="font-lobster text-slate-600 text-xl">
            {{ $montant }} FCFA
          </strong>
        </span>
        <span>
          Date limite de remboursement :&nbsp;
          <em class="font-lobster text-slate-600 text-lg not-italic">
            {{ $date }}
          </em>
        </span>
      </div>
      <div>
        <button class="flex items-center justify-center gap-2 w-[220px] py-5 font-semibold bg-slate-900 transition duration-300 hover:bg-slate-700 active:bg-slate-500 text-slate-50 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
          </svg>
          Signer le contract
        </button>
          
      </div>
    </section>
  </article>
</div>