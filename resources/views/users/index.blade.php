<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Users') }}
                </h2>
            </div>
            <div>
                <x-create-button :route="route('users.create')" target="User" />
            </div>

        </div>



    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-success-message />
                <x-table.main :headers="['User Name', 'Email', 'Department', 'Role', 'Actions']">
                    @foreach($users as $user)
                        <x-table.row>
                            <x-table.cell :cell="$user->name" />
                            <x-table.cell :cell="$user->email" />
                            <x-table.cell :cell="$user->department->name ?? 'N/A'" />
                            <x-table.cell :cell="$user->role->name ?? 'N/A'" />
                            <x-table.cell>
                                <div class="flex items-center justify-center space-x-4 w-full">
                                    <x-action.view :route="route('users.show', $user->id)" />
                                    <x-action.edit :route="route('users.edit', $user->id)" />
                                    <x-action.delete :route="route('users.destroy', $user->id)" />
                                </div>
                            </x-table.cell>
                        </x-table.row>

                    @endforeach
                </x-table.main>

                <div class=" p-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

