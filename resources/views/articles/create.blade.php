<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvel article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <h2 class="text-lg font-medium text-gray-900 mb-1">Rédiger un article</h2>
                    <p class="text-sm text-gray-600 mb-6">Remplissez les champs ci-dessous puis publiez.</p>

                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Titre')" />
                            <x-text-input id="title" name="title" type="text"
                                          class="mt-1 block w-full"
                                          :value="old('title')"
                                          placeholder="Titre de votre article"
                                          required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="body" :value="__('Contenu')" />
                            <textarea id="body" name="body" rows="10"
                                      placeholder="Rédigez votre article..."
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">{{ old('body') }}</textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('articles.my-articles') }}"
                               class="text-sm text-gray-600 hover:text-gray-900 transition">
                                Annuler
                            </a>
                            <x-primary-button>{{ __('Publier') }}</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>