<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des locaux') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($subplaces as $subplace)
                            <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                                <a href="{{ route('subplaces.show', $subplace->id) }}">
                                <div class="flex w-full items-center justify-between space-x-6 p-6">
                                    <div class="flex-1 truncate">
                                        <div class="flex items-center space-x-3">
                                            <h3 class="truncate text-sm font-medium text-gray-900"> {{$subplace->name}} </h3>
                                        </div>
                                        <div>
                                            <p class="mt-1 truncate text-sm text-gray-500"> {{ $subplace->place->name ?? 'N/A' }} </p>
                                        </div>
                                        <div class="flex">
                                            <p class="mt-1 truncate text-sm text-gray-500"> Nombre de d'item :
                                                <span> {{$subplace->id}} </span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                </a>
                            </li>
                        @endforeach
                        
                    </ul>
                    <div class="mt-4">
                            <a href="{{ route('subplaces.create') }}"><x-primary-button>{{ __('Ajouter un Local') }}</x-primary-button></a>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>