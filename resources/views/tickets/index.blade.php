<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Tickets') }}
                </h2>
            </div>
            <div>
                <x-create-button :route="route('tickets.create')" target="Ticket" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-success-message />
                <x-table.main :headers="['Email', 'Ticket ID', 'Status' , 'Department', 'Assigned To', 'Updated At', 'Actions']">
                    @foreach($tickets as $ticket)
                        <x-table.row>
                            <x-table.cell :cell="$ticket->email" />
                            <x-table.cell :cell="$ticket->reference" />
                            <x-table.cell :cell="$ticket->status->name ?? 'N/A'" />
                            <x-table.cell :cell="$ticket->department->name ?? 'N/A'" />
                            <x-table.cell :cell="$ticket->user->name ?? 'N/A'" />
                            <x-table.cell :cell="$ticket->updated_at ?? 'N/A'" />
                            <x-table.cell>
                                <div class="flex items-center justify-center space-x-4 w-full">
                                    <x-action.view :route="route('tickets.show', $ticket->id)" />
                                    <x-action.edit :route="route('tickets.edit', $ticket->id)" />
                                    <x-action.delete :route="route('tickets.destroy', $ticket->id)" />
                                </div>
                            </x-table.cell>
                        </x-table.row>

                    @endforeach
                </x-table.main>

                <div class="mt-4">
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

