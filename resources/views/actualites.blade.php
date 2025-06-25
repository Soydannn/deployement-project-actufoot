<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Actualités - ActuFoot360</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow p-6 text-center">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/actufoot.png') }}" alt="Logo" class="h-24 w-auto">
        </div>
        <nav class="mt-4 space-x-6">
            <a href="{{ route('actualites') }}" class="text-green-600 font-sans uppercase font-bold">ACTUALITÉS</a>
            <a href="{{ route('transferts') }}" class="text-black hover:text-green-600  font-sans uppercase">TRANSFERT</a>
            <a href="{{ route('champions') }}" class="text-black hover:text-green-600 font-sans uppercase">LIGUE DES CHAMPIONS</a>
            <a href="{{ route('palmares') }}" class="text-black hover:text-green-600 font-sans uppercase">PALMARÈS</a>
            <a href="{{ route('nations') }}" class="text-black hover:text-green-600  font-sans uppercase">LIGUE DES NATIONS</a>
            <a href="{{ route('videos') }}" class="text-black hover:text-green-600  font-sans uppercase">VIDÉOS</a>
        </nav>
        <form action="{{ route('search') }}" method="GET" class="flex items-center space-x-2 mt-4 justify-center">
            <input type="text" name="query" placeholder="Rechercher..." class="p-2 border rounded w-64" required>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Rechercher</button>
        </form>
    </header>

    <main class="max-w-6xl mx-auto p-6">

        <!-- Dernière Actualité -->
        @if ($lastArticle)
        <section class="mb-12">
        <h2 class="text-2xl font-bold text-black-600 mb-4">À la une</h2>
        <div class="bg-white shadow p-6 rounded-lg">
        @if (!empty($lastArticle->image))
            <img src="{{ $lastArticle->image }}" alt="{{ $lastArticle->titre }}" class="w-full h-full object-cover mb-4 rounded" />
        @endif
        <h3 class="text-xl font-bold mb-2">{{ $lastArticle->titre }}</h3>
        @if (!empty($lastArticle->categorie))
            <p class="text-sm text-gray-600 mb-2">Catégorie : {{ $lastArticle->categorie }}</p>
        @endif
        {{-- Certains modèles ont 'contenu', d'autres 'description' --}}
        <p class="mb-4">
            {{ Str::limit(strip_tags(html_entity_decode($lastArticle->contenu ?? $lastArticle->description ?? ''), 150)) }}
        </p>
        <a class="text-green-600  px-4 py-2 rounded hover:underline" href="{{ route('champions.show', ['id' => $lastArticle->id]) }}">En savoir plus</a>                    
    </div>
</section>
@endif

        
        <!-- Les 3 derniers transferts -->
        <section class="max-w-6xl mx-auto px-4 py-8 bg-white rounded shadow mt-8">
            <h2 class="text-2xl font-bold text-black-600 mb-4">Les derniers transferts </h2>
            <a href="{{ route('transferts') }}" class="text-green-600 hover:underline text-sm">Voir tout →</a>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($transferts as $transfert)
                    <div class="bg-white border border-gray-300 rounded p-4 shadow hover:shadow-lg transition">
                        @if ($transfert->image)
                            <img src="{{ $transfert->image }}" alt="{{ $transfert->titre }}" class="w-full h-40 object-cover rounded mb-4" />
                        @endif
                        <p class="text-gray-700">
                          {{ Str::limit(strip_tags(html_entity_decode($transfert->description)), 100) }}
                        </p>
                        <a class="text-green-600  px-4 py-2 rounded hover:underline" href="{{ route('transfert.show', ['id' => $transfert->id]) }}">En savoir plus</a>                    
                      </div>
                @endforeach
            </div>
        </section>


        <!-- Les dernières infos de la Ligue des Champions -->
      <section class="max-w-6xl mx-auto px-4 py-8 bg-white rounded shadow mt-8">
       <h2 class="text-2xl font-semibold text-black-600 mb-6">Les dernières infos de la Ligue des Champions </h2>
       <a href="{{ route('champions') }}" class="text-green-600 hover:underline text-sm">Voir tout →</a>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($champions as $champion)
              <div class="border border-gray-300 rounded p-4 shadow hover:shadow-lg transition">
              @if ($champion->image)
                  <img src="{{ $champion->image }}" alt="{{ $champion->titre }}" class="w-full h-40 object-cover rounded mb-4">
              @endif
              <h3 class="text-xl font-bold mb-2">{{ $champion->titre }}</h3>
              {{ Str::limit(strip_tags(html_entity_decode($champion->contenu)), 100) }}
              <a class="text-green-600  px-4 py-2 rounded hover:underline" href="{{ route('champions.show', ['id' => $champion->id]) }}">En savoir plus</a>                    
            </div>
          @endforeach
        </div>
      </section>

      <!-- Les dernières infos concernant le Palmarès -->
        <section class="max-w-6xl mx-auto px-4 py-8 bg-white rounded shadow mt-8">
          <h2 class="text-2xl font-semibold text-black-600 mb-6">Les dernières infos concernant les Palmarès </h2>
          <a href="{{ route('palmares') }}" class="text-green-600 hover:underline text-sm">Voir tout →</a>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              @foreach ($palmares as $info)
                  <div class="border border-gray-300 rounded p-4 shadow hover:shadow-lg transition">
                      @if ($info->image)
                          <img src="{{ $info->image }}" alt="{{ $info->titre }}" class="w-full h-40 object-cover rounded mb-4">
                      @endif
                      <p class="text-gray-700 mb-4"> {{ Str::limit(strip_tags(html_entity_decode($info->description)), 100) }}</p>
                      <a class="text-green-600  px-4 py-2 rounded hover:underline" href="{{ route('palmares.show', ['id' => $info->id]) }}">En savoir plus</a>                    
                  </div>
              @endforeach
          </div>
        </section>

        <!-- Les dernières infos concernant la Ligues des Nations -->
        <section class="max-w-6xl mx-auto px-4 py-8 bg-white rounded shadow mt-8">
          <h2 class="text-2xl font-semibold text-black-600 mb-6">Les dernières infos concernant la ligue des Nations </h2>
          <a href="{{ route('nations') }}" class="text-green-600 hover:underline text-sm">Voir tout →</a>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($nations as $nation)
            <div class="border border-gray-300 rounded p-4 shadow hover:shadow-lg transition">
                @if ($nation->image)
                    <img src="{{ $nation->image }}" alt="#" class="w-full h-40 object-cover rounded mb-4">
                @endif
                <h3 class="text-xl font-bold mb-2">{{ $nation->titre }}</h3>  <!-- <-- Ajout du titre ici -->
                <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags(html_entity_decode($nation->contenu)), 100) }}</p>
                <a class="text-green-600  px-4 py-2 rounded hover:underline" href="{{ route('nations.show', ['id' => $nation->id]) }}">En savoir plus</a>                    
            </div>
        @endforeach
          </div>
        </section>



     <!-- Vidéos -->
     <section class="max-w-6xl mx-auto px-4 py-8 bg-white rounded shadow mt-8">
      <h2 class="text-2xl font-semibold mb-6">Retrouvez le récapitulatif des matchs </h2>
      <a href="{{ route('videos') }}" class="text-green-600 hover:underline text-sm">Voir tout →</a>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          @foreach ($videos as $video)
              <div class="border border-gray-200 rounded p-4 shadow hover:shadow-lg transition">
                  <div class="aspect-w-16 aspect-h-9 mb-3">
                      <iframe
                          class="w-full h-48 rounded"
                          src="{{ Str::replace('watch?v=', 'embed/', $video->url) }}"
                          frameborder="0"
                          allowfullscreen>
                      </iframe>
                  </div>
                  <h3 class="text-m font-bold mb-2">{{ $video->Titre }}</h3>
              </div>
          @endforeach
      </div>
  </section>
  <div class="flex justify-between mt-8">
    <span></span> 
    <a href="{{ route('transferts') }}" class="text-black-600 hover:underline">Page suivante →</a>
</div>
</main>
                      <!-- Footer -->
      <footer class="bg-white shadow mt-16">
        <div class="max-w-4xl mx-auto px-6 py-10 text-center text-gray-700 flex flex-col items-center">
          
          <!-- Logo -->
          <div class="flex justify-center mb-4">
            <img src="{{ asset('images/actufoot.png') }}" alt="Logo" class="h-24 w-auto">
        </div>
          <!-- Description -->
          <p class="text-sm mb-6 max-w-md">
            Le meilleur de l'actualité foot : transferts, Ligue des Champions, Ligue des Nations, vidéos, palmarès et plus encore.
          </p>

          <!-- Navigation -->
          <div class="flex flex-wrap justify-center gap-6 text-sm mb-6">
            <a href="{{ route('actualites') }}" class="hover:underline font-bold">Actualités</a>
            <a href="{{ route('transferts') }}" class="hover:underline">Transferts</a>
            <a href="{{ route('champions') }}" class="hover:underline">Ligue des Champions</a>
            <a href="{{ route('palmares') }}" class="hover:underline">Palmarès</a>
            <a href="{{ route('nations') }}" class="hover:underline">Ligue des Nations</a>
            <a href="{{ route('videos') }}" class="hover:underline">Vidéos</a>
          </div>

          <!-- Réseaux sociaux -->
          <div class="flex justify-center space-x-6 text-sm mb-6">
            <a href="#" class="hover:underline">Twitter</a>
            <a href="#" class="hover:underline">Instagram</a>
            <a href="#" class="hover:underline">YouTube</a>
          </div>

          <!-- Copyright -->
          <p class="text-xs text-gray-500">&copy; {{ date('Y') }} ActuFoot360 — Tous droits réservés.</p>
        </div>
      </footer>

          