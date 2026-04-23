<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier l'article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-8">

                {{-- PUT : même principe que DELETE, on passe par POST + @method('PUT') --}}
                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="title"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Titre
                        </label>
                        {{-- old('title', $article->title) : --}}
                        {{-- - 1er argument : clé dans la session flash (ce que l'user a tapé) --}}
                        {{-- - 2ème argument : valeur par défaut si pas d'erreur (valeur actuelle) --}}
                        <input type="text" id="title" name="title"
                               value="{{ old('title', $article->title) }}"
                               class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700
                                      dark:text-white rounded-md shadow-sm
                                      focus:ring-indigo-500 focus:border-indigo-500"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="body"
                               class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Contenu
                        </label>
                        <textarea id="body" name="body" rows="12"
                                  class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700
                                         dark:text-white rounded-md shadow-sm
                                         focus:ring-indigo-500 focus:border-indigo-500"
                                  required>{{ old('body', $article->body) }}</textarea>
                        @error('body')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit"
                                class="bg-indigo-600 text-white px-6 py-2 rounded-md
                                       hover:bg-indigo-700 transition">
                            Enregistrer
                        </button>
                        <a href="{{ route('articles.my-articles') }}"
                           class="text-gray-600 dark:text-gray-400 hover:underline text-sm">
                            Annuler
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>