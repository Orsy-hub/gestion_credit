<!-- Card pour l'offre -->
<section 
  x-data="{ 
    showModal: false,
    open: false 
  }" 
  class="max-w-3xl w-full sm:w-[80%] p-5 bg-white rounded-lg shadow-lg overflow-hidden flex flex-col gap-4">
  <div class="flex flex-col gap-3">
    <h2 class="text-xl font-semibold text-gray-800">
      {{ $titre }}
    </h2>
    <div class="flex flex-col gap-2">
      <p class="text-gray-600 text-base">Bayeur :  <strong>{{ $bayeur_nom }}</strong></p>
      <p class="text-gray-600 text-base">Montant : <strong>{{ $montant }} €</strong></p>
      <p class="text-gray-600 text-base">Date de l'offre : <strong>{{ $date_offre }}</strong></p>
      <p class="text-gray-600 text-base">Date limite : <strong>{{ $date_limite }}</strong></p>
      <p class="text-gray-600 text-base">Taux d'intérêt : <strong>{{ $taux_interet }}% fixe</strong></p>
      <p class="text-gray-600 text-base "><strong>Conditions</strong> : <br>
        {{ $conditions }}
      </p>
    </div>
  </div>

  <!-- Boutons -->
  @if($current_user->id === $bayeur_id)
    <div class="flex gap-3 font-ubuntu">
      {{-- {{ 'Bayeur id'. $bayeur_id .' Voyeur id'. $user->id}} --}}
        <button @click="showModal = true" class="flex items-center gap-3 px-4 py-2 text-white bg-red-600 rounded-lg transition-colors duration-300 hover:bg-red-800 active:bg-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sm:size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
          </svg>
          <p class="text-sm">
            Supprimer <span class="hidden">l'offre</span>
          </p>
        </button>
        <button @click="open = true" 
          class="flex items-center gap-3 px-4 py-2 text-white bg-blue-600 rounded-lg transition-colors duration-300 hover:bg-blue-800 active:bg-blue-500">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 sm:size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
          </svg>
          <p class="text-sm">
            Modifier <span class="hidden">l'offre</span>
          </p>
        </button>      
      </div>
    @endif

  <!-- Modal de confirmation -->
  <div 
    x-show="showModal" 
    x-transition 
    x-cloak
    class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
  >
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
      <h2 class="text-xl font-semibold text-gray-800">Êtes-vous sûr de vouloir supprimer l'offre <strong  class="text-green-900 font-ubuntu underline">{{ $titre }}</strong> ?</h2>
      <div class="flex justify-end gap-3 mt-4">
        <button @click="showModal = false" class="px-4 py-2 text-white bg-gray-500 rounded-lg hover:bg-gray-700">Annuler</button>
        <form action="{{ route('offres.delete', ['id' => $id]) }}" method="POST">
          @csrf
          <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-800">Confirmer la suppression</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Formulaire de modification -->
  <div
    x-show="open"
    x-transition
    x-cloak
    class="fixed inset-0 cursor-pointer p-2 flex items-center justify-center bg-gray-900 bg-opacity-50"
  >
    <form  action="{{ route('offres.update', ['id' => $offre]) }}" method="POST"
      class="mt-4 w-full sm:w-[40%] bg-gray-100 p-4 rounded-lg shadow-md"
    >
      @csrf
      @method('PUT')
  
      <div class="mb-3">
        <label for="titre" class="block text-sm font-medium text-gray-700">Titre </label>
        <input type="text" name="titre" id="titre_offre{_{ $offre->id }}" value="{{ $titre }}" class="mt-1 p-2 w-full border rounded-md">
    </div>
  
      <div class="mb-3">
          <label for="montant" class="block text-sm font-medium text-gray-700">Montant (FCFA)</label>
          <input type="number" name="montant" id="montant_offre_{{ $offre->id }}" value="{{ $offre->montant }}" class="mt-1 p-2 w-full border rounded-md">
      </div>
  
      <div class="mb-3">
          <label for="taux_interet" class="block text-sm font-medium text-gray-700">Taux d'intérêt (%)</label>
          <input type="number" name="taux_interet" id="taux_interet_{{ $offre->id }}" value="{{ $offre->taux_interet }}" class="mt-1 p-2 w-full border rounded-md">
      </div>
  
      <div class="mb-3">
          <label for="conditions" class="block text-sm font-medium text-gray-700">Conditions</label>
          <textarea name="conditions" id="conditions_offre_{{ $offre->id }}" class="mt-1 p-2 w-full border rounded-md">{{ $offre->conditions }}</textarea>
      </div>
  
      <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
        Enregistrer <span class="hidden">les modifications</span>
    </button>
      <button type="button" @click="open = false"  class="px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white rounded-lg transition">
          Annuler
      </button>
    </form>
  </div>
</section>
