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
      <button class="w-full sm:w-auto bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none">
          Contacter les parties
      </button>
      <button class="w-full sm:w-auto bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 focus:outline-none">
          Clôturer le litige
      </button>
      <button class="w-full sm:w-auto bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 focus:outline-none">
          Suspendre les parties
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