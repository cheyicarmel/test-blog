<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <p class="text-sm text-gray-500 mb-6">
                    Par <span class="font-medium text-gray-700">{{ $article->user->name }}</span>
                    · {{ $article->created_at->format('d/m/Y à H:i') }}
                    @if($article->updated_at->gt($article->created_at))
                        · <span class="text-amber-600">modifié {{ $article->updated_at->diffForHumans() }}</span>
                    @endif
                </p>

                <div class="text-gray-700 text-sm leading-relaxed whitespace-pre-wrap">
                    {{ $article->body }}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <a href="{{ route('articles.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 text-white text-xs font-semibold rounded-md uppercase tracking-widest hover:bg-gray-700 transition">
                        ← Retour aux articles
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>