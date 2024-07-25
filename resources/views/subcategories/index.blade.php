<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des modèles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($subcategories as $subcategory)
                            <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                                <a href="{{ route('subcategories.show', $subcategory->id) }}">
                                <div class="flex w-full items-center justify-between space-x-6 p-6">
                                    <div class="flex-1 truncate">
                                        <div class="flex items-center space-x-3">
                                            <h3 class="truncate text-sm font-medium text-gray-900"> {{$subcategory->name}}</h3>
                                        </div>
                                        <div>
                                            <p class="mt-1 truncate text-sm text-gray-500"> {{ $subcategory->category->name ?? 'N/A' }} </p>
                                        </div>
                                        <div class="flex">
                                            <p class="mt-1 truncate text-sm text-gray-500"> Nombre de d'équipements :
                                                <span> {{$subcategory->items->count()}} </span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                </a>
                            </li>
                        @endforeach
                        
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('subcategories.create') }}"><x-primary-button>{{ __('Ajouter une sous-catégorie') }}</x-primary-button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>