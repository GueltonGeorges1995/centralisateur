<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Supprimer une catégorie') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois la catégorie supprimée, toutes les sous-categories liées seront supprimées aussi') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-place-deletion')"
    >{{ __("Supprimer la catégorie") }}</x-danger-button>

    <x-modal name="confirm-place-deletion" focusable>
    <form method="post" action="{{ route('categories.destroy', $category) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Êtes-vous sûr de vouloir supprimer cette catégorie ?") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("U'Une fois la catégorie supprimée, toutes les sous-categories liées seront supprimées aussi. Aucun retour en arrière n'est possible") }}
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
