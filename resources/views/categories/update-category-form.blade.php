<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Modification de la catégorie") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Vous pouvez changer le nom de la catégorie.") }}
        </p>
    </header>

    <form method="post" action="{{ route('categories.update', $category) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="">Nom de la catégorie</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value=" {{$category->name}} " required autofocus autocomplete="name" />
          
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
        </div>
    </form>
</section>
