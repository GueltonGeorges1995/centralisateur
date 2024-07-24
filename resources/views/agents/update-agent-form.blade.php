<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Modification de l'agent") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Vous pouvez changer le nom et le département de l'agent") }}
        </p>
    </header>

    <form method="post" action="{{ route('agents.update', $agent) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="">Nom du local</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value=" {{$agent->name}} "
                required autofocus autocomplete="name" />

        </div>
        <div class="mt-2">
        <label for="">Département</label>
            <select id="department_id" name="department_id" autocomplete="department-name"
                class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
        </div>
    </form>
</section>