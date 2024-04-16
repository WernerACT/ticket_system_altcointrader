<div x-data="{ open: false }">
    <button @click="open = !open" class="w-full px-4 py-2 text-left text-white bg-gray-700 hover:bg-gray-600">
        Ticket Documents ({{ count($documents) }})
    </button>
    <div x-show="open" class="bg-gray-900 p-4">
        <table class="w-full text-left text-white">
            @if((count($documents) > 0))
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Created Date</th>
                </tr>
                </thead>
            @endif

            <tbody>
            @forelse($documents as $document)
                <tr class="hover:bg-blue-700">
                    <td>{{ $document->name }}</td>
                    <td>{{ $document->created_at->diffForHumans()  }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No documents available.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
