<section class="border p-5 rounded-xl flex  font-poppins shadow-md">
  <div class="flex flex-col gap-3">
    <p class="w-[55%] ">
      Une nouvelle demande d'inscription a éte reçue. L'utilisateur <strong class="font-ubuntu">{{ $user->name }}</strong>, inscrit avec l'adresse e-mail &nbsp;<i class="text-blue-500">{{ $user->email }}</i>, est en attente de validation.
    </p>
    <ul class="list-disc list-inside pl-2">
      <li>
        Rôle : <strong class="font-ubuntu text-slate-700">{{ $user->role }}</strong>
      </li>
      @if($user->role === 'Bayeur')
        <li>
          solde disponible : <strong class="font-lobster text-slate-700">{{ $user->solde }} FCFA</strong>
        </li>
      @endif
    </ul>
    Merci de vérifier ses informations et de valider son compte.
    <div class="relative w-[400px] h-[250px] bg-slate-500 rounded-xl">
      <img src="" alt="Piece Justificative de l'utilisateur" class="p-5 rounded-xl">
    </div>

    {{-- Section pour effectuer les differentes action sur l'utilisateur. --}}
    <div 
      x-data = "{
        showModal: false,
        actionType: ''
      }"
    >
    
    <form 
      action="{{ route('admin.validate', ['id_user' => $user->id]) }}" 
      class="flex items-center gap-3 text-white font-ubuntu">
        <button type="submit" class="bg-green-700 transition-colors duration-300 hover:bg-green-500 active:bg-green-900 px-6 py-2 rounded-xl flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
          </svg>
          Valider
        </button>
        
        {{-- Bouton pour Rejeter la demande. --}}
        <button 
          type="button" 
          @click="actionType = 'Rejeter'; showModal = true"
          class="bg-red-700 transition-colors duration-300 hover:bg-red-500 active:bg-red-800 px-6 py-2 rounded-xl flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
          </svg>
          Rejeter
        </button>
        
        {{-- Bouton pour Suspendre la demande. --}}
        <button 
          type="button" 
          @click="actionType = 'Suspendre'; showModal = true"
          class="bg-blue-200 transition-colors duration-300 hover:bg-blue-100 active:bg-blue-300 px-6 py-2 rounded-xl flex items-center gap-2 text-slate-800">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
          </svg>
          Suspendre
        </button>
  
        {{-- Boite modal pour la confirmation. --}}
        <div 
          x-show="showModal"
          x-cloak 
          class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
          <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold text-gray-800">Confirmer l'action</h2>
            <p class="text-gray-600 mt-2">
              Voulez-vous vraiment 
              <span x-text="actionType"></span> 
              la demande d'inscription de l'utilisateur <strong class="text-green-800">{{ $user->name }}</strong>?
            </p>
            <form
              method="POST" class="flex justify-end mt-4 gap-2">
              <button @click="showModal = false" class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">Annuler</button>
              <button @click="executeAction()" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">Confirmer</button>
            </form>
          </div>
        </div>
      </form>
    </div>
  </div>
  {{-- Section pour afficher l'avatar de l'utilisateur. --}}
  <div class="w-[200px] flex justify-center">
    <div class="relative w-[80px] h-[80px] rounded-full bg-slate-100 shadow-md overflow-hidden">
      @if($user->image)
        <img class="w-full h-full object-cover" src="{{ asset('storage/'. $user->image) }}" alt="Photo de profil {{ $user->role }}">
      @else
        <span class="w-full h-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-[80px] text-gray-500">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
          </svg>
        </span>
      @endif
    </div>
  </div>

  {{--  --}}
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

</section>