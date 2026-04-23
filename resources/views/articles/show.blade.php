<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-8">

                <p class="text-sm text-gray-500 mb-8">
                    Par <strong>{{ $article->user->name }}</strong>
                    — {{ $article->created_at->format('d/m/Y à H:i') }}
                </p>

                {{-- whitespace-pre-wrap : respecte les sauts de ligne saisis dans le textarea --}}
                <div class="text-gray-800 dark:text-gray-200 leading-relaxed whitespace-pre-wrap">
                    {{ $article->body }}
                </div>

            </div>

            <a href="{{ route('articles.index') }}"
               class="inline-block mt-6 text-indigo-600 hover:underline text-sm">
                ← Retour aux articles
            </a>

        </div>
    </div>
</x-app-layout>