<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Modification de l'utilisateur") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Vous pouvez changer le nom l'adresse mail et le rôle d'un utilisateur") }}
        </p>
    </header>

    <form method="post" action="{{ route('users.update', $user) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name">Nom d'utilisateur</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                value=" {{ $user->name }} " required autocomplete="name" />

        </div>
        <div class="mt-2">
            <label for="email">Adresse mail</label>
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full"
                value=" {{ $user->email }} " required autocomplete="name" />
        </div>
        <div class="mt-2">
            <label for="role">Rôle</label>
            <select id="role" name="role" autocomplete="role-name"
                class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                <option value={{ $user->role }} selected> {{ $user->role }} </option>

                @if ($user->role !== 'basic')
                    <option value="basic">Basic</option>
                @endif
                @if ($user->role !== 'admin')
                    <option value="admin">Admin</option>
                @endif
                @if ($user->role !== 'super_admin')
                    <option value="super_admin">Super Admin</option>
                @endif
            </select>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>
        </div>
    </form>
</section>
