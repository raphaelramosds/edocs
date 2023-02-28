<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo edital') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('announcements.store') }}">

                        @csrf
                        
                        <!-- Document -->

                        <div>
                            <x-input-label for="number" :value="__('Número')" />
                            <x-text-input id="number" class="block mt-1 w-full" type="number" name="number"
                                :value="old('number')" required autofocus />
                            <x-input-error :messages="$errors->get('number')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Descrição')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="old('description')" required autofocus />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="released_at" :value="__('Data de publicação')" />
                            <x-text-input id="released_at" class="block mt-1 w-full" type="date" name="released_at"
                                :value="old('released_at')" required autofocus />
                            <x-input-error :messages="$errors->get('released_at')" class="mt-2" />
                        </div>

                        <!-- Announcement -->

                        <div>
                            <x-input-label for="begin_date" :value="__('Início das inscrições')" />
                            <x-text-input id="begin_date" class="block mt-1 w-full" type="date" name="begin_date"
                                :value="old('begin_date')" required autofocus />
                            <x-input-error :messages="$errors->get('begin_date')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="end_date" :value="__('Fim das inscrições')" />
                            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date"
                                :value="old('end_date')" required autofocus />
                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>

                        <!-- Submit button -->

                        <x-primary-button class="mt-4">{{ __('Salvar') }}</x-primary-button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
