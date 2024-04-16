<div x-data="{ open: false }">
    <button @click="open = !open" class="w-full px-4 py-2 text-left text-white bg-gray-700 hover:bg-gray-600">
        Previous Responses ({{ count($responses) }})
    </button>
    <div x-show="open" class="bg-gray-900 p-4">
        <table class="w-full text-white">
            @if(count($responses) > 0)
                <thead>
                <tr>
                    <th>User</th>
                    <th>Created Date</th>
                    <th>Excerpt</th>
                </tr>
                </thead>
            @endif
            <tbody>
            @forelse($responses as $response)
                <tr class="hover:bg-blue-700">
                    <td>{{ $response->user->name }}</td>
                    <td>{{ $response->created_at->diffForHumans() }}</td>
                    <td>{{ $response->body }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No responses yet.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
