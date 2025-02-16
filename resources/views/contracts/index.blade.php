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
    <!-- Entete du site -->
    @include('partials.header.index')

    <!-- Section pour effectuer les actions filtre des contracts. -->
    @include('partials.contractFilterSection.index')

    <div class="mt-5">
      <div class="flex gap-10">
        <section class="w-[200px] h-[200px] border flex items-center justify-center flex-col gap-2 text-slate-400 bg-slate-0 transition-colors duration-300 hover:text-slate-600 hover:bg-slate-300 p-5 cursor-pointer rounded-xl">
          <div class="bg-slate-600 w-[80px] h-[80px] flex justify-center items-center rounded-full text-white text-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
          </div>
          <div class="flex flex-col items-center">
            <span>
              <em class="not-italic text-slate-800">
                Emprunteur : &nbsp;
              </em>
              <strong class="text-lg text-slate-800">
                Kami
              </strong>
            </span>
            <em class="not-italic">
              ravenkami@gmail.com
            </em>
          </div>
        </section>
        <section class="border shadow-md rounded-xl w-full p-5 flex justify-between">
          <div class="flex flex-col gap-3 ">
            <h1 class="relative w-min font-bold font-viga text-slate-900 text-3xl lg:text-5xl leading-tight cursor-pointer after:absolute after:bottom-0 after:left-0 after:w-full after:h-1 after:bg-slate-900 after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
              Titre
            </h1>
            <p class="text-slate-500 w-[450px] font-ubuntu">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum mollitia beatae maiores debitis sapiente unde, cum harum eaque! Fuga minus natus magnam delectus incidunt neque tempore similique animi tempora dignissimos?
            </p>
            <div class="flex flex-col font-poppins">
              <span>
                Montant de l'emprunt :&nbsp;
                <strong class="font-lobster text-slate-600 text-xl">
                  50000 FCFA
                </strong>
              </span>
              <span>
                Date de remboursement :&nbsp;
                <em class="font-lobster text-red-400 font-medium text-lg not-italic">
                  24/02/2025
                </em>
              </span>
              <span x-data="{ time: new Date() }" x-init="setInterval(() => time = new Date(), 1000)">
                Date actuelle :&nbsp;
                <em class="font-lobster text-slate-600 text-lg not-italic" x-text="time.toLocaleString('fr-FR', { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' })">
                </em>
              </span>
            </div>
            <div class="flex flex-col justify-center gap-3">
              <button title="renbourser l'emprunt effectue" class="flex items-center justify-center gap-2 w-[220px] py-5 font-semibold bg-green-900 transition duration-300 hover:bg-green-700 active:bg-green-500 text-slate-50 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                </svg>
                Solder le contract
              </button>
              <button title="Signaler une violation de contract" class="flex items-center justify-center gap-2 w-[220px] py-5 font-semibold bg-red-900 transition duration-300 hover:bg-red-700 active:bg-red-500 text-slate-50 rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
              </svg>
                Signaler
              </button>
            </div>
          </div>
          
        </section>
        <section class="w-auto h-min border flex items-center justify-center flex-col gap-2 text-slate-400 bg-slate-0 transition-colors duration-300 hover:text-slate-600 hover:bg-slate-300 p-5 cursor-pointer rounded-xl">
          <div class="bg-slate-600 w-[80px] h-[80px] flex justify-center items-center rounded-full text-white text-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
          </div>
          <div class="flex flex-col justify-center items-center">
            <span>
              <em class="not-italic text-slate-800">
                Bayeur : &nbsp;
              </em>
              <strong class="text-lg text-slate-800">
                OUSAMA Bodji
              </strong>
            </span>
            <em class="not-italic">
              rangkingofking@gmail.com
            </em>
          </div>
        </section>
      </div>
    </div>
  </div>
</body>
</html>