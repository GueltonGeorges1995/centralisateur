<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Modification du fournisseur") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Vous pouvez changer le nom du fournisseur") }}
        </p>
    </header>

    <form method="post" action="{{ route('suppliers.update', $supplier) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="">Nom du fournisseur</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value=" {{$supplier->name}} "
                required autofocus autocomplete="name" />

        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
        </div>
    </form>
</section>