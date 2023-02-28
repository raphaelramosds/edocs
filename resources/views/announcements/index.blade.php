<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Add and search for announcements -->

            <div class="pb-4 text-gray-900">
                <x-primary-link :href="route('announcements.create')">
                    {{ __('Novo Edital') }}
                </x-primary-link>
            </div>

            <!-- List announcements -->

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($announcements as $announcement)
                        <div class="flex py-2">

                            <!-- Doc icon -->

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>

                            <!-- Announcement details -->

                            <div class="pl-4 w-full">
                                <div class="flex">
                                    <span class="flex-1">
                                        Edital N°{{ $announcement->document->number }}
                                        {{ $announcement->document->description }}/{{ explode('-',$announcement->document->released_at)[0] }}
                                    </span>
                                </div>
                                <small>Inscrições de {{ $announcement->begin_date }} a {{ $announcement->end_date }}</small>
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
                                    <x-dropdown-link :href="route('announcements.edit', $announcement)">
                                        {{ __('Editar') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('announcements.destroy', $announcement) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link
                                            onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                            {{ __('Excluir') }}
                                        </x-dropdown-link>
                                    </form>

                                    <x-dropdown-link :href="route('announcements.attachments.index', [$announcement])">
                                        {{ __('Anexos') }}
                                    </x-dropdown-link>

                                </x-slot>
                            </x-dropdown>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
