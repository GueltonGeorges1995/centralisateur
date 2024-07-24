<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Gestion des Équipements") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('items.store') }}">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Formulaire de création d'un équipement</h2>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <!-- Name Field -->
                                    <div class="sm:col-span-4">
                                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nom de l'équipement</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="name" id="name" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Nom de l'équipement">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Category Field -->
                                    <div class="sm:col-span-4">
                                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Catégorie</label>
                                        <div class="mt-2">
                                            <select id="category" name="category_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="">Sélectionner une catégorie</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Subcategory Field -->
                                    <div class="sm:col-span-4">
                                        <label for="subcategory" class="block text-sm font-medium leading-6 text-gray-900">Sous-catégorie</label>
                                        <div class="mt-2">
                                            <select id="subcategory" name="subcategory_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" disabled>
                                                <option value="">Sélectionner une sous-catégorie</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Place Field -->
                                    <div class="sm:col-span-4">
                                        <label for="place" class="block text-sm font-medium leading-6 text-gray-900">Lieu</label>
                                        <div class="mt-2">
                                            <select id="place" name="place_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="">Sélectionner un lieu</option>
                                                @foreach($places as $place)
                                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Subplace Field -->
                                    <div class="sm:col-span-4">
                                        <label for="subplace" class="block text-sm font-medium leading-6 text-gray-900">Sous-lieu</label>
                                        <div class="mt-2">
                                            <select id="subplace" name="subplace_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" disabled>
                                                <option value="">Sélectionner un sous-lieu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Department Field -->
                                    <div class="sm:col-span-4">
                                        <label for="department" class="block text-sm font-medium leading-6 text-gray-900">Département</label>
                                        <div class="mt-2">
                                            <select id="department" name="department_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="">Sélectionner un département</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Agent Field -->
                                    <div class="sm:col-span-4">
                                        <label for="agent" class="block text-sm font-medium leading-6 text-gray-900">Agent</label>
                                        <div class="mt-2">
                                            <select id="agent" name="agent_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" disabled>
                                                <option value="">Sélectionner un agent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="supplier" class="block text-sm font-medium leading-6 text-gray-900">Fournisseur</label>
                                        <div class="mt-2">
                                            <select id="supplier" name="supplier_id" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="">Sélectionner un Fournisser</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="SN" class="block text-sm font-medium leading-6 text-gray-900">SN</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="SN" id="SN" autocomplete="SN" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="SN de l'objet">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <label for="BOS" class="block text-sm font-medium leading-6 text-gray-900">Ref BOS</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="BOS" id="BOS" autocomplete="BOS" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Ref BOS">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                        <div class="mt-2">
                                            <textarea name="description" id="description" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ajouter une description"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-start gap-x-6">
                            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="{{ route('items.index') }}">Annuler</a>
                            </button>
                            <x-primary-button>{{ __('Créer') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Dynamic Fetching -->
    <script>
        // Function to fetch subcategories based on selected category
        document.getElementById('category').addEventListener('change', function() {
            var categoryId = this.value;
            var subcategorySelect = document.getElementById('subcategory');
            subcategorySelect.innerHTML = '<option value="">Sélectionner une sous-catégorie</option>'; // Reset options

            if (categoryId) {
                var url = `/api/categories/${categoryId}/subcategories`; 

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        subcategorySelect.disabled = false;
                        data.forEach(subcategory => {
                            var option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subcategorySelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching subcategories:', error);
                        subcategorySelect.disabled = true;
                    });
            } else {
                subcategorySelect.disabled = true;
            }
        });

        // Function to fetch subplaces based on selected place
        document.getElementById('place').addEventListener('change', function() {
            var placeId = this.value;
            var subplaceSelect = document.getElementById('subplace');
            subplaceSelect.innerHTML = '<option value="">Sélectionner un sous-lieu</option>'; // Reset options

            if (placeId) {
                var url = `/api/places/${placeId}/subplaces`;

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        subplaceSelect.disabled = false;
                        data.forEach(subplace => {
                            var option = document.createElement('option');
                            option.value = subplace.id;
                            option.textContent = subplace.name;
                            subplaceSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching subplaces:', error);
                        subplaceSelect.disabled = true;
                    });
            } else {
                subplaceSelect.disabled = true;
            }
        });

        // Function to fetch agents based on selected department
        document.getElementById('department').addEventListener('change', function() {
            var departmentId = this.value;
            var agentSelect = document.getElementById('agent');
            agentSelect.innerHTML = '<option value="">Sélectionner un agent</option>'; // Reset options

            if (departmentId) {
                var url = `/api/departments/${departmentId}/agents`;

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        agentSelect.disabled = false;
                        data.forEach(agent => {
                            var option = document.createElement('option');
                            option.value = agent.id;
                            option.textContent = agent.name;
                            agentSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching agents:', error);
                        agentSelect.disabled = true;
                    });
            } else {
                agentSelect.disabled = true;
            }
        });
    </script>
</x-app-layout>
