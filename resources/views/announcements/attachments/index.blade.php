<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Anexos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Novo Anexo -->

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('announcements.attachments.store', $announcement) }}"
                        enctype="multipart/form-data">

                        @csrf

                        <!-- File -->

                        <div>
                            <x-input-label for="description" :value="__('Descrição')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                                :value="old('description')" autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="file" :value="__('Arquivo')" />
                            <x-text-input id="file" class="block mt-1 w-full" type="file" name="file"
                                :value="old('file')" autofocus />
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>


                        <!-- Submit button -->

                        <x-primary-button class="mt-4">{{ __('Adicionar') }}</x-primary-button>

                    </form>
                </div>
            </div>

            <!-- Listagem dos anexos -->


            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 mt-6 text-gray-900">
                    @foreach ($attachments as $attachment)
                        <div class="flex py-2">

                            <!-- Doc icon -->

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>

                            <!-- Attachment details -->

                            <div class="pl-4 w-full">
                                <div class="flex">
                                    <span class="flex-1">
                                        ANEXO - {{ $attachment->description }}
                                    </span>
                                </div>
                            </div>

                            <!-- Actions -->

                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div class="ml-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-linK>
                                        {{ __('Arquivo') }}
                                    </x-dropdown-linK>

                                    @php
                                        $data = [
                                            'announcement' => $announcement,
                                            'attachment' => $attachment,
                                        ];
                                    @endphp

                                    <form method="POST"
                                        action="{{ route('announcements.attachments.destroy', $data) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Excluir') }}
                                        </x-dropdown-link>
                                    </form>

                                </x-slot>
                            </x-dropdown>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
