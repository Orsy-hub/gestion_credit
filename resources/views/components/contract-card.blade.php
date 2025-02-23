@if($offre->montant <= $offre->bayeur->solde)
  <div class="space-y-10 md:space-y-16">
    <article class="flex flex-col lg:flex-row lg:gap-10 lg:p-8 pb-8 md:pb-16 border-b">
      <div class="lg:w-[400px] lg:h-auto flex items-center justify-center flex-col gap-2 text-slate-400 bg-slate-100 transition-colors duration-300 hover:text-slate-600 hover:bg-slate-300 p-5 cursor-pointer rounded-xl">
        @if($offre->bayeur->image)
          <img class="w-[90px] h-[90px] transition-all duration-300 hover:w-[120px] hover:h-[120px] rounded-full object-cover" src="{{ asset('storage/'. $offre->bayeur->image) }}" alt="Photo de profil {{ Auth::user()->role }}">
        @else
          <div class="bg-slate-600 w-[80px] h-[80px] flex justify-center items-center rounded-full text-white text-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
          </div>
        @endif
        <div class="flex flex-col items-center">
          <strong class="text-xl text-slate-800">
            {{ $offre->bayeur->name }}
          </strong>
          <em class="not-italic">
            {{ $offre->bayeur->email }}offre
          </em>
        </div>
      </div>
      
      <section class="bg-gray-100 flex flex-col gap-6 px-6 py-8 rounded-xl shadow-md">
        <!-- Titre de l'offre -->
        <h1 class="relative w-max font-bold font-viga text-slate-900 text-3xl lg:text-4xl leading-tight cursor-pointer 
          after:absolute after:bottom-0 after:left-0 after:w-full after:h-1 after:bg-blue-600 after:scale-x-0 
          after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100">
          {{ $offre->titre }}
        </h1>
        
        <!-- Conditions de l'offre -->
        <p class="text-gray-600 text-lg font-ubuntu leading-relaxed">
          {{ $offre->conditions }}
        </p>
      
        <!-- Détails du contrat -->
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 font-poppins">
          <span class="flex items-center gap-2 text-lg text-gray-700">
            💰 <span class="text-sm">Montant de l'emprunt :</span> 
            <strong class="font-lobster text-blue-700 text-xl">
              {{ $offre->montant }} FCFA
            </strong>
          </span>
      
          <span class="flex items-center gap-2 text-sm text-gray-700">
            ⏳ <span>Date remboursement :</span> 
            <em class="font-lobster text-blue-700 text-lg not-italic">
              {{ $offre->date_limite }}
            </em>
          </span>
        </div>
      
        <!-- Bouton pour signer le contrat -->
        @if($user->role == 'Emprunteur')
          <form 
            action="{{ route('emprunts.store') }}" 
            method="POST" 
            class="flex justify-center"
          >
            @csrf
            <input type="hidden" name="emprunteur_id" value="{{ $user->id }}">
            <input type="hidden" name="offre_id" value="{{ $offre->id }}">
            <button type="submit" class="flex items-center justify-center gap-3 w-[240px] py-3 text-lg font-semibold bg-blue-600 hover:bg-blue-700 active:bg-blue-500 transition duration-300 text-white rounded-full shadow-md">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
              </svg>
              Signer le contrat
            </button>
          </form>
        @endif
      </section>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Succès!',
                text: '{{ session('success') }}',
                timer: 5000, // La popup disparaît après 5s
                showConfirmButton: true
            });
        </script>
      @endif

      @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Erreur!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
      @endif
  </div>
@endif