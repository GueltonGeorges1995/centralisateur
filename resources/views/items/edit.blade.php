<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des équipements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __("Modification de l'équipement") }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Vous pouvez changer toutes les caractéristiques de l'équipement") }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('items.update', $item) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div class="sm:col-span-4">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom de l'objet</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="name" id="name" autocomplete="username"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="Nom de l'objet" value="{{ $item->name }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Category Field -->
                            <div class="sm:col-span-4">
                                <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Catégorie</label>
                                <div class="mt-2">
                                    <select id="category" name="category_id"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="{{ $item->category->id }}">{{ $item->category->name }}</option>
                                        @foreach($categories as $category)
                                            @if ($item->category->id != $category->id)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Subcategory Field -->
                            <div class="sm:col-span-4">
                                <label for="subcategory" class="block text-sm font-medium leading-6 text-gray-900">Modèle</label>
                                <div class="mt-2">
                                    <select id="subcategory" name="subcategory_id"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="{{ $item->subcategory->id }}">{{ $item->subcategory->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Place Field -->
                            <div class="sm:col-span-4">
                                <label for="place" class="block text-sm font-medium leading-6 text-gray-900">Lieu</label>
                                <div class="mt-2">
                                    <select id="place" name="place_id"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="{{ $item->place->id }}">{{ $item->place->name }}</option>
                                        @foreach($places as $place)
                                            @if ($item->place->id != $place->id)
                                                <option value="{{ $place->id }}">{{ $place->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Subplace Field -->
                            <div class="sm:col-span-4">
                                <label for="subplace" class="block text-sm font-medium leading-6 text-gray-900">Sous-lieu</label>
                                <div class="mt-2">
                                    <select id="subplace" name="subplace_id"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="{{ $item->subplace->id }}">{{ $item->subplace->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Department Field -->
                            <div class="sm:col-span-4">
                                <label for="department" class="block text-sm font-medium leading-6 text-gray-900">Département</label>
                                <div class="mt-2">
                                    <select id="department" name="department_id"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="{{ $item->department->id }}">{{ $item->department->name }}</option>
                                        @foreach($departments as $department)
                                            @if ($item->department->id != $department->id)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Agent Field -->
                            <div class="sm:col-span-4">
                                <label for="agent" class="block text-sm font-medium leading-6 text-gray-900">Agent</label>
                                <div class="mt-2">
                                    <select id="agent" name="agent_id"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="{{ $item->agent->id }}">{{ $item->agent->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="supplier" class="block text-sm font-medium leading-6 text-gray-900">Fournisseur</label>
                                <div class="mt-2">
                                    <select id="supplier" name="supplier_id"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="{{ $item->supplier->id }}">{{ $item->supplier->name }}</option>
                                        @foreach($suppliers as $supplier)
                                            @if ($item->supplier->id != $supplier->id)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="SN" class="block text-sm font-medium leading-6 text-gray-900">SN</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="SN" id="SN" autocomplete="SN" value="{{ $item->SN }}"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="SN de l'objet">
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="BOS" class="block text-sm font-medium leading-6 text-gray-900">Ref BOS</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="BOS" id="BOS" autocomplete="BOS" value="{{ $item->BOS }}"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            placeholder="Ref BOS">
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea name="description" id="description" rows="4"
                                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Ajouter une description">{{ $item->description }}</textarea>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
                                <a href="{{ route('items.show', $item->id) }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Annuler') }}</a>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Dynamic Fetching -->
    <script>
        // Function to fetch subcategories based on selected category
        document.getElementById('category').addEventListener('change', function () {
            var categoryId = this.value;
            var subcategorySelect = document.getElementById('subcategory');
            subcategorySelect.innerHTML = ''; // Reset options

            if (categoryId) {
                var url = `/api/categories/${categoryId}/subcategories`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategory => {
                            var option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching subcategories:', error);
                    });
            }
        });

        // Function to fetch subplaces based on selected place
        document.getElementById('place').addEventListener('change', function () {
            var placeId = this.value;
            var subplaceSelect = document.getElementById('subplace');
            subplaceSelect.innerHTML = ''; // Reset options

            if (placeId) {
                var url = `/api/places/${placeId}/subplaces`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subplace => {
                            var option = document.createElement('option');
                            option.value = subplace.id;
                            option.textContent = subplace.name;
                            subplaceSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching subplaces:', error);
                    });
            }
        });

        // Function to fetch agents based on selected department
        document.getElementById('department').addEventListener('change', function () {
            var departmentId = this.value;
            var agentSelect = document.getElementById('agent');
            agentSelect.innerHTML = ''; // Reset options

            if (departmentId) {
                var url = `/api/departments/${departmentId}/agents`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(agent => {
                            var option = document.createElement('option');
                            option.value = agent.id;
                            option.textContent = agent.name;
                            agentSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching agents:', error);
                    });
            }
        });

        // Load initial subcategories
        document.addEventListener('DOMContentLoaded', function() {
            var initialCategoryId = document.getElementById('category').value;
            if (initialCategoryId) {
                var url = `/api/categories/${initialCategoryId}/subcategories`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        var subcategorySelect = document.getElementById('subcategory');
                        subcategorySelect.innerHTML = ''; // Reset options
                        data.forEach(subcategory => {
                            var option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            if (subcategory.id == {{ $item->subcategory->id }}) {
                                option.selected = true;
                            }
                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching initial subcategories:', error);
                    });
            }
        });

        // Load initial subplaces
        document.addEventListener('DOMContentLoaded', function() {
            var initialPlaceId = document.getElementById('place').value;
            if (initialPlaceId) {
                var url = `/api/places/${initialPlaceId}/subplaces`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        var subplaceSelect = document.getElementById('subplace');
                        subplaceSelect.innerHTML = ''; // Reset options
                        data.forEach(subplace => {
                            var option = document.createElement('option');
                            option.value = subplace.id;
                            option.textContent = subplace.name;
                            if (subplace.id == {{ $item->subplace->id }}) {
                                option.selected = true;
                            }
                            subplaceSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching initial subplaces:', error);
                    });
            }
        });

        // Load initial agents
        document.addEventListener('DOMContentLoaded', function() {
            var initialDepartmentId = document.getElementById('department').value;
            if (initialDepartmentId) {
                var url = `/api/departments/${initialDepartmentId}/agents`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        var agentSelect = document.getElementById('agent');
                        agentSelect.innerHTML = ''; // Reset options
                        data.forEach(agent => {
                            var option = document.createElement('option');
                            option.value = agent.id;
                            option.textContent = agent.name;
                            if (agent.id == {{ $item->agent->id }}) {
                                option.selected = true;
                            }
                            agentSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching initial agents:', error);
                    });
            }
        });
    </script>
</x-app-layout>
