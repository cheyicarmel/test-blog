<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Mes articles
            </h2>
            {{-- Bouton de création uniquement sur cette page --}}
            <a href="{{ route('articles.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm hover:bg-indigo-700 transition">
                + Nouvel article
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Message flash affiché une seule fois après une action --}}
            @session('success')
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-800 rounded-md">
                    {{ $value }}
                </div>
            @endsession

            @forelse ($articles as $article)
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 mb-4">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold">
                                <a href="{{ route('articles.show', $article) }}"
                                   class="text-indigo-700 dark:text-indigo-400 hover:underline">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Publié {{ $article->created_at->diffForHumans() }}
                                @if($article->updated_at != $article->created_at)
                                    {{-- Affiche "modifié" seulement si l'article a été édité --}}
                                    · <em>modifié {{ $article->updated_at->diffForHumans() }}</em>
                                @endif
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mt-3">
                                {{ Str::limit($article->body, 150) }}
                            </p>
                        </div>

                        {{-- Boutons d'action à droite --}}
                        <div class="flex items-center gap-3 ml-4 shrink-0">
                            <a href="{{ route('articles.edit', $article) }}"
                               class="text-indigo-600 hover:underline text-sm font-medium">
                                Modifier
                            </a>
                            {{-- Suppression : formulaire POST + @method('DELETE') --}}
                            {{-- Les formulaires HTML ne supportent que GET et POST nativement --}}
                            {{-- @method('DELETE') ajoute un champ caché _method=DELETE --}}
                            {{-- que Laravel intercepte et traite comme une vraie requête DELETE --}}
                            <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                  onsubmit="return confirm('Supprimer cet article définitivement ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-500 hover:underline text-sm font-medium">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-8 text-center">
                    <p class="text-gray-500 mb-4">Vous n'avez pas encore écrit d'article.</p>
                    <a href="{{ route('articles.create') }}"
                       class="bg-indigo-600 text-white px-5 py-2 rounded-md hover:bg-indigo-700 transition">
                        Écrire mon premier article
                    </a>
                </div>
            @endforelse

            <div class="mt-6">{{ $articles->links() }}</div>

        </div>
    </div>
</x-app-layout>