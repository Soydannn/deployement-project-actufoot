<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Transferts - ActuFoot360</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow p-6 text-center">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/actufoot.png') }}" alt="Logo" class="h-24 w-auto">
        </div>
        <nav class="mt-4 space-x-6">
            <a href="{{ route('actualites') }}" class="text-black font-sans uppercase">ACTUALITÉS</a>
            <a href="{{ route('transferts') }}" class="text-green-600 font-sans uppercase font-bold">TRANSFERT</a>
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

      <h1 class="text-3xl font-bold mb-8 text-center">Bievenue dans la page qui présente les transferts durant l'été 2025</h1>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($transferts as $transfert)
          <article class="bg-white border border-gray-300 rounded p-4 shadow hover:shadow-lg transition flex flex-col">
            @if ($transfert->image)
              <img src="{{ $transfert->image }}" alt="{{ $transfert->titre }}" class="w-full h-40 object-cover rounded mb-4" />
            @endif
            <h2 class="text-xl font-bold mb-2">{{ $transfert->titre }}</h2>
            <p class="text-gray-700 mb-4 flex-grow">
              {{ Str::limit(strip_tags(html_entity_decode($transfert->description)), 120) }}
            </p>
            <a class="text-green-600  px-4 py-2 rounded hover:underline" href="{{ route('transfert.show', ['id' => $transfert->id]) }}">En savoir plus</a>                    
          </article>
        @endforeach
      </div>

      <div class="flex justify-between mt-8">
        <a href="{{ route('actualites') }}" class="text-black-600 hover:underline">← Page précédente</a>
        <a href="{{ route('champions') }}" class="text-bkack-600 hover:underline">Page suivante →</a>
    </div>
    </main>
    <!-- Footer -->
    <footer class="bg-white shadow mt-16">
      <div class="max-w-4xl mx-auto px-6 py-10 text-center text-gray-700 flex flex-col items-center">
        
        <div class="flex justify-center mb-4">
          <img src="{{ asset('images/actufoot.png') }}" alt="Logo" class="h-24 w-auto">
        </div>

        <p class="text-sm mb-6 max-w-md">
          Le meilleur de l'actualité foot : transferts, Ligue des Champions, Ligue des Nations, vidéos, palmarès et plus encore.
        </p>

        <div class="flex flex-wrap justify-center gap-6 text-sm mb-6">
          <a href="{{ route('actualites') }}" class="hover:underline">Actualités</a>
          <a href="{{ route('transferts') }}" class="hover:underline font-bold">Transferts</a>
          <a href="{{ route('champions') }}" class="hover:underline">Ligue des Champions</a>
          <a href="{{ route('palmares') }}" class="hover:underline">Palmarès</a>
          <a href="{{ route('nations') }}" class="hover:underline">Ligue des Nations</a>
          <a href="{{ route('videos') }}" class="hover:underline">Vidéos</a>
        </div>

        <div class="flex justify-center space-x-6 text-sm mb-6">
          <a href="#" class="hover:underline">Twitter</a>
          <a href="#" class="hover:underline">Instagram</a>
          <a href="#" class="hover:underline">YouTube</a>
        </div>

        <p class="text-xs text-gray-500">&copy; {{ date('Y') }} ActuFoot360 — Tous droits réservés.</p>
      </div>
    </footer>

</body>
</html>
