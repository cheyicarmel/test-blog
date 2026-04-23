<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mes articles') }}
            </h2>
            <a href="{{ route('articles.create') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-xs font-semibold rounded-md uppercase tracking-widest hover:bg-gray-700 transition">
                Nouvel article
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @session('success')
                <div class="p-4 bg-green-50 border border-green-200 text-green-700 text-sm sm:rounded-lg">
                    {{ $value }}
                </div>
            @endsession

            @forelse ($articles as $article)
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="flex items-start justify-between gap-6">

                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                <a href="{{ route('articles.show', $article) }}"
                                   class="hover:text-indigo-600 transition">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500 mb-3">
                                Publié {{ $article->created_at->diffForHumans() }}
                                @if($article->updated_at->gt($article->created_at))
                                    · <span class="text-amber-600">modifié {{ $article->updated_at->diffForHumans() }}</span>
                                @endif
                            </p>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                {{ Str::limit($article->body, 160) }}
                            </p>
                        </div>

                        <div class="flex items-center gap-3 shrink-0">
                            <a href="{{ route('articles.edit', $article) }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-xs font-semibold rounded-md uppercase tracking-widest hover:bg-gray-700 transition">
                                Modifier
                            </a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                  onsubmit="return confirm('Supprimer cet article ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-white text-red-600 text-xs font-semibold rounded-md uppercase tracking-widest border border-red-300 hover:bg-red-50 transition">
                                    Supprimer
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <p class="text-gray-500 text-sm">Vous n'avez pas encore écrit d'article.</p>
                </div>
            @endforelse

            <div>{{ $articles->links() }}</div>

        </div>
    </div>
</x-app-layout>