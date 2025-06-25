<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Videos - ActuFoot360</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow p-6 text-center">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/actufoot.png') }}" alt="Logo" class="h-24 w-auto">
        </div>
        <nav class="mt-4 space-x-6">
            <a href="{{ route('actualites') }}" class="ext-black hover:text-green-600  font-sans uppercase">ACTUALITÉS</a>
            <a href="{{ route('transferts') }}" class="text-black hover:text-green-600  font-sans uppercase">TRANSFERT</a>
            <a href="{{ route('champions') }}" class="text-black hover:text-green-600 font-sans uppercase">LIGUE DES CHAMPIONS</a>
            <a href="{{ route('palmares') }}" class="text-black hover:text-green-600 font-sans uppercase">PALMARÈS</a>
            <a href="{{ route('nations') }}" class="text-black hover:text-green-600  font-sans uppercase">LIGUE DES NATIONS</a>
            <a href="{{ route('videos') }}" class="text-green-600 font-sans uppercase font-bold">VIDÉOS</a>
        </nav>
        <form action="{{ route('search') }}" method="GET" class="flex items-center space-x-2 mt-4 justify-center">
            <input type="text" name="query" placeholder="Rechercher..." class="p-2 border rounded w-64" required>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Rechercher</button>
        </form>
    </header>
    <main class="max-w-6xl mx-auto p-6">
        <!-- Vidéos -->
        <section class="max-w-6xl mx-auto px-4 py-8 bg-white rounded shadow mt-8">
            <h2 class="text-2xl font-semibold mb-6">Retrouvez le récapitulatif des matchs </h2>
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
            <a href="{{ route('nations') }}" class="text-black-600 hover:underline">← Page précédente</a>
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
          <a href="{{ route('transferts') }}" class="hover:underline">Transferts</a>
          <a href="{{ route('champions') }}" class="hover:underline">Ligue des Champions</a>
          <a href="{{ route('palmares') }}" class="hover:underline">Palmarès</a>
          <a href="{{ route('nations') }}" class="hover:underline">Ligue des Nations</a>
          <a href="{{ route('videos') }}" class="hover:underline font-bold">Vidéos</a>
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
