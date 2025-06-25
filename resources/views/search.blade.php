<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Recherche - ActuFoot360</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow p-6 text-center">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/actufoot.png') }}" alt="Logo" class="h-24 w-auto">
        </div>
        <nav class="mt-4 space-x-6">
            <a href="{{ route('actualites') }}" class="text-black hover:text-green-600  font-sans uppercase">ACTUALITÉS</a>
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
        <h2 class="text-2xl font-bold mb-8">Résultats pour : <span class="italic">"{{ $query }}"</span></h2>

        <!-- Transferts -->
        <section class="mb-12">
            <h3 class="text-xl font-semibold mb-4">Transferts</h3>
            @if ($transferts->isEmpty())
                <p class="text-gray-600 italic">Aucun résultat trouvé dans les transferts.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($transferts as $transfert)
                        <article class="bg-white border border-gray-300 rounded p-4 shadow hover:shadow-lg transition flex flex-col">
                            @if ($transfert->image)
                                <img src="{{ $transfert->image }}" alt="{{ $transfert->titre }}" class="w-full h-40 object-cover rounded mb-4" />
                            @endif
                            <h4 class="text-lg font-bold mb-2">{{ $transfert->titre }}</h4>
                            <p class="text-gray-700 mb-4 flex-grow">{{ Str::limit(strip_tags(html_entity_decode($transfert->description)), 120) }}</p>
                            <a href="{{ route('transfert.show', ['id' => $transfert->id]) }}" class="text-green-600 hover:underline px-4 py-2 rounded">En savoir plus</a>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- Ligue des Champions -->
        <section class="mb-12">
            <h3 class="text-xl font-semibold mb-4">Ligue des Champions</h3>
            @if ($champions->isEmpty())
                <p class="text-gray-600 italic">Aucun résultat trouvé dans la Ligue des Champions.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($champions as $champion)
                        <article class="bg-white border border-gray-300 rounded p-4 shadow hover:shadow-lg transition">
                            @if ($champion->image)
                                <img src="{{ $champion->image }}" alt="{{ $champion->titre }}" class="w-full h-40 object-cover rounded mb-4">
                            @endif
                            <h4 class="text-lg font-bold mb-2">{{ $champion->titre }}</h4>
                            <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags(html_entity_decode($champion->contenu)), 100) }}</p>
                            <a href="{{ route('champions.show', ['id' => $champion->id]) }}" class="text-green-600 hover:underline px-4 py-2 rounded">En savoir plus</a>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- Ligue des Nations -->
        <section class="mb-12">
            <h3 class="text-xl font-semibold mb-4">Ligue des Nations</h3>
            @if ($nations->isEmpty())
                <p class="text-gray-600 italic">Aucun résultat trouvé dans la Ligue des Nations.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($nations as $nation)
                        <article class="bg-white border border-gray-300 rounded p-4 shadow hover:shadow-lg transition">
                            @if ($nation->image)
                                <img src="{{ $nation->image }}" alt="{{ $nation->titre }}" class="w-full h-40 object-cover rounded mb-4">
                            @endif
                            <h4 class="text-lg font-bold mb-2">{{ $nation->titre }}</h4>
                            <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags(html_entity_decode($nation->contenu)), 100) }}</p>
                            <a href="{{ route('nations.show', ['id' => $nation->id]) }}" class="text-green-600 hover:underline px-4 py-2 rounded">En savoir plus</a>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- Palmarès -->
        <section class="mb-12">
            <h3 class="text-xl font-semibold mb-4">Palmarès</h3>
            @if ($palmares->isEmpty())
                <p class="text-gray-600 italic">Aucun résultat trouvé dans les palmarès.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($palmares as $info)
                        <article class="bg-white border border-gray-300 rounded p-4 shadow hover:shadow-lg transition">
                            @if ($info->image)
                                <img src="{{ $info->image }}" alt="{{ $info->titre }}" class="w-full h-40 object-cover rounded mb-4">
                            @endif
                            <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags(html_entity_decode($info->description)), 100) }}</p>
                            <a href="{{ route('palmares.show', ['id' => $info->id]) }}" class="text-green-600 hover:underline px-4 py-2 rounded">En savoir plus</a>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- Vidéos -->        
       <section class="mb-12 max-w-6xl mx-auto px-4 py-8 bg-white rounded shadow mt-8">
    <h3 class="text-xl font-semibold mb-4">Retrouvez le récapitulatif des matchs</h3>

    @if ($videos->isEmpty())
        <p class="text-gray-600 italic">Aucun résultat trouvé dans les vidéos.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($videos as $video)
                <article class="bg-white border border-gray-200 rounded p-4 shadow hover:shadow-lg transition">
                    <div class="aspect-w-16 aspect-h-9 mb-3">
                        <iframe
                            class="w-full h-48 rounded"
                            src="{{ Str::replace('watch?v=', 'embed/', $video->url) }}"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>
                    <h3 class="text-m font-bold mb-2">{{ $video->Titre }}</h3>
                </article>
            @endforeach
        </div>
    @endif
</section>
        <!-- Pagination ou navigation simple -->
        <div class="flex justify-between mt-8">
            <a href="{{ route('actualites') }}" class="text-black hover:underline">← Retour à la page d'actualités</a>
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
