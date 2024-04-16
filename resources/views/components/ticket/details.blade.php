<div x-data="{ open: true }">
    <button @click="open = !open" class="w-full px-4 py-2 text-left text-white bg-gray-700 hover:bg-gray-600">
        Ticket Details
    </button>
    <div x-show="open" class="bg-gray-900 p-4">
        <table class="w-full text-white">
            <thead class="text-left">
            <tbody>
                <tr class="hover:bg-blue-700">
                    <td>Status</td>
                    <td>{{ $ticket->status->name }}</td>
                </tr>
                <tr class="hover:bg-blue-700">
                    <td>Department</td>
                    <td>{{ $ticket->department->name }}</td>
                </tr>
                <tr class="hover:bg-blue-700">
                    <td>Assigned To</td>
                    <td>{{ $ticket->user->name }}</td>
                </tr>
                <tr class="hover:bg-blue-700">
                    <td>Created Date</td>
                    <td>{{ $ticket->created_at->diffForHumans() }}</td>
                </tr>
                <tr class="hover:bg-blue-700">
                    <td>Updated Date</td>
                    <td>{{ $ticket->updated_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="underline font-extrabold text-xl pt-4" >Description</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-xl" >{{ $ticket->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
