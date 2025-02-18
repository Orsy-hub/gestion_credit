<div 
  x-show="isOpen" 
  class="fixed inset-0 bg-black/50 flex items-center justify-center w-full p-10"
  @click="isOpen = false"
>
  <div 
    class="bg-white p-6 rounded-lg shadow-lg w-full sm:w-96 lg:w-[700px]"
    @click.stop
  >
    <div
      class="flex justify-end"
    >
      <button
        @click="isOpen = false"
      >
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <h3 class="text-lg font-semibold mb-4">Créer une nouvelle offre</h3>
    <form class="">
      <label class="block mb-2">Titre</label>
      <input type="text" class="w-full border p-2 rounded mb-4">
      <label class="block mb-2">Montant</label>
      <input type="number" class="w-full border p-2 rounded mb-4">
      <label class="block mb-2">Taux d'intérêt</label>
      <input type="number" class="w-full border p-2 rounded mb-4">
      <label class="block mb-2">Date de remboursement</label>
      <input type="date" class="w-full border p-2 rounded mb-4">
      <label class="block mb-2">Décrivez les conditions de votre offre</label>
      {{-- <input type="" class="w-full border p-2 rounded mb-4"> --}}
      <textarea id="description" name="description" rows="6" class="form-control w-full border p-2 rounded mb-4"></textarea>
      <button class="bg-green-800 text-white px-4 py-2 rounded hover:bg-green-600">Soumettre</button>
    </form>
  </div>
</div>