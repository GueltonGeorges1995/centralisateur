<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Modification de l'emplacement") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Vous pouvez changer le nom et l'adresse de l'emplacement.") }}
        </p>
    </header>

    <form method="post" action="{{ route('places.update', $place) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="">Nom de l'emplacement</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value=" {{$place->name}} " required  autocomplete="name" />
          
        </div>
        <div>
            <label for="">Adresses de l'emplacement</label>
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" value=" {{$place->address}} " required  autocomplete="address" />
        </div>

        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
        </div>
    </form>
</section>
