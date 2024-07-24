<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Modification du local") }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Vous pouvez changer le nom et l'emplacement du local.") }}
        </p>
    </header>
    <form method="post" action="{{ route('subplaces.update', $subplace) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <label for="">Nom du local</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value=" {{$subplace->name}} "
                required  autocomplete="name" />

        </div>
        <div class="mt-2">
        <label for="">Emplacement</label>
            <select id="place_id" name="place_id" autocomplete="place-name"
                class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                @foreach ($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
        </div>
    </form>
</section>