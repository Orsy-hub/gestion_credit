<section class="max-w-5xl mx-auto bg-white flex flex-col gap-3 rounded-lg shadow-lg p-6 mb-6">
  {{-- Entete du litige. --}}
  <div class="flex items-center justify-between border-b pb-4 mb-4">
    <h2 class="text-xl font-semibold text-gray-700">
      Litige : Non-remboursement d'un prêt
    </h2>
    <span class="text-sm text-gray-500">
      Statut : &nbsp;<strong class="font-bold text-yellow-500">En attente de résolution</strong>
    </span>
  </div>

  {{-- Information sur L'emprunteur et le Preteur --}}
  <section class=" flex flex-col gap-3 text-base text-gray-700 mx-[10%]">
    <div class="flex justify-between">
      <p class="font-medium text-gray-600">Emprunteur :</p>
      <p class="">Sarah Mbuyi</p>
    </div>

    <div class="flex justify-between">
      <p class="font-medium text-gray-600">Prêteur :</p>
      <p class="">Patrick Kasongo</p>
    </div>

    <div class="flex justify-between">
      <p class="font-medium text-gray-600">Montant prêté :</p>
      <p class="">1 200 000 FCFA</p>
    </div>

    <div class="flex justify-between">
      <p class="font-medium text-gray-600">Montant remboursé :</p>
      <p class="">0 FCFA</p>
    </div>

    <div class="flex justify-between">
      <p class="font-medium text-gray-600">Date d'emprunt :</p>
      <p class="">15 Décembre 2024</p>
    </div>

    <div class="flex justify-between">
      <p class="font-medium text-gray-600">Date d'échance :</p>
      <p class="">22 Janvier 2025</p>
    </div>
  </section>

  {{-- Description du litige --}}
  <section class="mt-4 flex flex-col gap-1 px-2">
    <h2 class="text-sm text-gray-600"><span class="font-medium">Description du litige :</span></h2>
    <p class="w-[80%] text-sm text-gray-800 mt-1">"J’ai accordé un prêt de 1 200 000 CDF à Patrick Kasongo avec un remboursement prévu en une seule fois avant le 10 janvier 2025. Cependant, il m’a seulement remboursé 800 000 CDF et refuse maintenant de payer le reste, affirmant qu’il a déjà tout remboursé. Je fournis ici les preuves des transactions et demande une médiation de l’admin."</p>
  </section>

  <!-- Actions disponibles pour l'admin -->
  <div class="mt-6 flex gap-4">
      <button class="w-full flex items-center gap-2 sm:w-auto bg-blue-600 text-white py-2 px-4 transition-colors duration-300 rounded-lg hover:bg-blue-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 3.75v4.5m0-4.5h-4.5m4.5 0-6 6m3 12c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
        </svg>
          Contacter le(s) parti(s)
      </button>
      <button class="w-full flex items-center gap-2 sm:w-auto bg-green-600 text-white py-2 px-4 transition-colors duration-300 rounded-lg hover:bg-green-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
        </svg>
          Clôturer le litige
      </button>
      <button class="w-full flex items-center gap-2 sm:w-auto bg-red-600 text-white py-2 px-4 transition-colors duration-300 rounded-lg hover:bg-red-700 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
        </svg>
          Suspendre le(s) parti(s)
      </button>
  </div>

</section>












{{-- <section class="border p-5 flex flex-col gap-3">
  <h1 class="font-viga text-xl text-center">
    Titre du litige : Non-remboursement d'un prêt
  </h1>
  <ul class="font-poppins">
    <li>
      Utilisateur concerné : <strong>Jean Mbala</strong> (Emprunteur)
    </li>
    <li>
      Partie plaignante : <strong>David Ilunga</strong> (Prêteur)
    </li>
    <li>
      Montant en jeu : <strong>500 000</strong> FCFA
    </li>
    <li>
      Montant remboursé : <strong>0</strong> FCFA
    </li>
    <li>
      Date du prêt : <em class="font-serif font-semibold text-lg">10 Décembre 2024</em>
    </li>
    <li>
      Date d'écheance prévue : <em class="font-serif font-semibold ">15 Janvier 2025</em>
    </li>
    Statut du litige : <strong class="text-black/55 font-sans">En attente de résolution</strong>
  </ul>
  <strong>Description du litige :</strong>
  <p>
    J’ai prêté 500 000 CDF à Jean Mbala via la plateforme avec un accord de remboursement sous 30 jours. À ce jour, il n’a toujours pas remboursé malgré plusieurs rappels. J’ai essayé de le contacter, mais il ne répond plus. Je demande une intervention de l’administration pour trouver une solution à ce problème
  </p>
</section> --}}