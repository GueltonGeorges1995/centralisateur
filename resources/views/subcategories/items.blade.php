<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Équipements associé au modèle  ') . $subcategory->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($subcategory->items->isEmpty())
                    <p class="mt-1 text-sm text-gray-600">Aucun équipement trouvé.</p>
                    @else
                    <div class="">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900">Listes des Équipements de
                                    {{$subcategory->name}} </h1>
                                <p class="mt-2 text-sm text-gray-700">Une liste des tous les équipements IT se situant à
                                    l'emplacement {{$subcategory->name}}</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <div>
                                    <label for="search"
                                        class="block text-sm font-medium leading-6 text-gray-900">Recherche
                                        Rapide</label>
                                    <div class="relative mt-2 flex items-center">
                                        <input type="text" name="search" id="search"
                                            class="block w-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-8 flow-root w-full">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 w-full">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8 w-full">
                                    <table class="min-w-full divide-y divide-gray-300 w-full">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                    <a href="#" class="group inline-flex">
                                                        Nom
                                                        <span
                                                            class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    <a href="#" class="group inline-flex">
                                                        Local
                                                        <span
                                                            class="ml-2 flex-none rounded bg-gray-100 text-gray-900 group-hover:bg-gray-200">
                                                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    <a href="#" class="group inline-flex">
                                                        Sous-Catégorie
                                                        <span
                                                            class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                            <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    <a href="#" class="group inline-flex">
                                                        Agent
                                                        <span
                                                            class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                                                            <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible"
                                                                viewBox="0 0 20 20" fill="currentColor"
                                                                aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </th>
                                                <th scope="col" class="relative py-3.5 pl-3 pr-0">
                                                    <span class="sr-only">Voir plus</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach ($items as $item)
                                                <tr>
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                                        {{$item->name}}
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{$item->subplace->name}}
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{$item->subcategory->name}}
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        {{$item->agent->name}}
                                                    </td>
                                                    <td
                                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm sm:pr-0">
                                                        <a href=" {{ route('items.show', $item->id) }} "
                                                            class="text-indigo-600 hover:text-indigo-900">Voir
                                                            plus<span class="sr-only"> Voir plus</span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{ $items->links() }}
                        <div class="mt-6 flex justify-start">
                            <a href="{{ route('subcategories.show', $subcategory->id) }}"
                                class="text-sm font-semibold text-gray-900">
                                <x-primary-button>{{ __("Revenir en arrière" ) }}</x-primary-button>
                            </a>
                        </div>
                    </div>
                    @endif



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
