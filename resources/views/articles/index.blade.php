<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tous les articles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            @forelse ($articles as $article)
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 mb-4">
                    <h3 class="text-lg font-bold">
                        {{-- route('articles.show', $article) génère /articles/{id} --}}
                        <a href="{{ route('articles.show', $article) }}"
                           class="text-indigo-700 dark:text-indigo-400 hover:underline">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        {{-- $article->user fonctionne grâce à l'eager loading with('user') --}}
                        Par <strong>{{ $article->user->name }}</strong>
                        — {{ $article->created_at->diffForHumans() }}
                        {{-- diffForHumans() : "il y a 3 minutes" au lieu de "2026-04-22 14:30:00" --}}
                    </p>
                    <p class="text-gray-700 dark:text-gray-300 mt-3">
                        {{-- Str::limit() coupe à 200 caractères et ajoute "..." --}}
                        {{ Str::limit($article->body, 200) }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">Aucun article pour le moment.</p>
            @endforelse

            {{-- Liens de pagination générés automatiquement par Laravel --}}
            <div class="mt-6">{{ $articles->links() }}</div>

        </div>
    </div>
</x-app-layout>