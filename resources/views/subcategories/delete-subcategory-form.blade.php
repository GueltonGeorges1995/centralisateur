<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Supprimer une sous categorie') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois une sous categorie supprimée, tous les items seront supprimés aussi. .') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-place-deletion')"
    >{{ __("Supprimer le local") }}</x-danger-button>

    <x-modal name="confirm-place-deletion" focusable>
    <form method="post" action="{{ route('subcategories.destroy', $subcategory) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Êtes-vous sûr de vouloir supprimer ce local ?") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Une fois l'endroit supprimé, toutes les données associées seront perdues.") }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Supprimer') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
</section>
