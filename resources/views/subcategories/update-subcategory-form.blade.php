<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Modification du modèle") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Vous pouvez changer le nom et la catégorie du modèle") }}
        </p>
    </header>

    <form method="post" action="{{ route('subcategories.update', $subcategory) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="">Nom du modèle</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value=" {{$subcategory->name}} "
                required autocomplete="name" />

        </div>
        <div class="mt-2">
        <label for="">Categorie</label>
            <select id="catgory_id" name="category_id" autocomplete="category-name"
                class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
        </div>
    </form>
</section>