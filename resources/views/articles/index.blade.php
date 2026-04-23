<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if($articles->isEmpty())
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <p class="text-gray-500 text-sm">Aucun article pour le moment.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($articles as $article)
                        <div class="bg-white shadow sm:rounded-lg p-6 flex flex-col justify-between">
                            <div>
                                <h3 class="text-base font-semibold text-gray-800 mb-2">
                                    {{ $article->title }}
                                </h3>
                                <p class="text-xs text-gray-500 mb-3">
                                    Par <span class="font-medium">{{ $article->user->name }}</span>
                                    · {{ $article->created_at->diffForHumans() }}
                                </p>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ Str::limit($article->body, 120) }}
                                </p>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <a href="{{ route('articles.show', $article) }}"
                                   class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-xs font-semibold rounded-md uppercase tracking-widest hover:bg-gray-700 transition">
                                    Lire l'article
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-8">{{ $articles->links() }}</div>

        </div>
    </div>
</x-app-layout>