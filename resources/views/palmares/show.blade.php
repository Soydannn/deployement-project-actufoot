<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>ActuFoot360</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Header -->
    <header class="bg-white shadow p-6 text-center">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/actufoot.png') }}" alt="Logo" class="h-24 w-auto">
        </div>
        <nav class="mt-4 space-x-6">
            <a href="{{ route('actualites') }}" class="text-black hover:text-green-600 font-sans uppercase">ACTUALITÉS</a>
            <a href="{{ route('transferts') }}" class="text-black hover:text-green-600  font-sans uppercase">TRANSFERT</a>
            <a href="{{ route('champions') }}" class="text-black hover:text-green-600 font-sans uppercase">LIGUE DES CHAMPIONS</a>
            <a href="{{ route('palmares') }}" class="text-green-600 font-sans uppercase font-bold">PALMARÈS</a>
            <a href="{{ route('nations') }}" class="text-black hover:text-green-600  font-sans uppercase">LIGUE DES NATIONS</a>
            <a href="{{ route('videos') }}" class="text-black hover:text-green-600  font-sans uppercase">VIDÉOS</a>
        </nav>
        <form action="{{ route('search') }}" method="GET" class="flex items-center space-x-2 mt-4 justify-center">
            <input type="text" name="query" placeholder="Rechercher..." class="p-2 border rounded w-64" required>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Rechercher</button>
        </form>
    </header>

    <!-- Contenu principal -->
    <main class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h1 class="text-3xl font-bold text-black-600 mb-6">Détails du post</h1>

        @if ($palmares->image)
            <img src="{{ $palmares->image }}" alt="Image du transfert" class="w-full h-full object-cover mb-4 rounded">
        @endif

        <div class="flex flex-col gap-4 text-lg">
            <p><span class="font-semibold">Equipe :</span> {{ $palmares->equipe }}</p>
            <p><span class="font-semibold">Compétition :</span> {{ $palmares->competition }}</p>
            <p><span class="font-semibold">Année :</span> {{ $palmares->annee }}</p>
            <p><span class="font-semibold">Description :</span> {!! $palmares->description !!}</p>

        </div>
        <div class="mt-8">
            <a href="{{ route('actualites') }}" class="text-black-600 hover:underline text-sm">← Retour aux actualités</a>
        </div>
        <div class="mt-8">
            <a href="{{ route('palmares') }}" class="text-black-600 hover:underline text-sm">← Retour aux actualités concernant le palmarès</a>
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
                <a href="{{ route('palmares') }}" class="hover:underline font-bold">Palmarès</a>
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
