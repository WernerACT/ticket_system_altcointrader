<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Statuses') }}
                </h2>
            </div>
            <div>
                <x-create-button :route="route('statuses.create')" target="Status" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-success-message />
                <x-table.main :headers="['Name', 'Actions']">
                    @foreach($statuses as $status)
                        <x-table.row>
                            <x-table.cell :cell="$status->name" />

                            <x-table.cell>
                                <div class="flex items-center justify-center space-x-4 w-full">
                                    <x-action.view :route="route('statuses.show', $status->id)" />
                                    <x-action.edit :route="route('statuses.edit', $status->id)" />
                                    <x-action.delete :route="route('statuses.destroy', $status->id)" />
                                </div>
                            </x-table.cell>
                        </x-table.row>

                    @endforeach
                </x-table.main>

                <div class="mt-4">
                    {{ $statuses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

