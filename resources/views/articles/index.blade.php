<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">

            @forelse ($articles as $article)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">
                        {{ $article->title }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-3">
                        Par <span class="font-medium">{{ $article->user->name }}</span>
                        · {{ $article->created_at->diffForHumans() }}
                    </p>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        {{ Str::limit($article->body, 200) }}
                    </p>
                    <a href="{{ route('articles.show', $article) }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-xs font-semibold rounded-md uppercase tracking-widest hover:bg-gray-700 transition">
                        Lire l'article
                    </a>
                </div>
            @empty
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <p class="text-gray-500 text-sm">Aucun article pour le moment.</p>
                </div>
            @endforelse

            <div>{{ $articles->links() }}</div>

        </div>
    </div>
</x-app-layout>