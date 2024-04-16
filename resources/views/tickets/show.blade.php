<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Tickets ') .  $ticket->reference . ": " . $ticket->name }}
                </h2>
            </div>
            <div>
                <x-create-button :route="route('tickets.create')" target="Response" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col space-y-4">
                <!-- Ticket Details Column -->
                @include('components.ticket.details', ['ticket' => $ticket])

                <!-- Images Collapsible -->
                @include('components.ticket.images', ['images' => $ticket->images])

                <!-- Documents Collapsible -->
                @include('components.ticket.documents', ['documents' => $ticket->documents])

                <!-- Previous Responses Collapsible -->
                @include('components.ticket.responses', ['responses' => $ticket->responses])
            </div>
        </div>
    </div>
</x-app-layout>
