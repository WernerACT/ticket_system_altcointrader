<div class="p-6 space-y-4 rounded bg-gray-900 text-white">
    <div class="mb-4">
        <h3 class="text-xl text-center leading-6 font-medium">Respond to Ticket</h3>
    </div>
    <form method="POST" action="{{ route('tickets.show', $ticket->id) }}">
        @csrf
        <div class="mb-6">
            <textarea name="response" rows="8" class="w-full p-2 rounded bg-gray-800" placeholder="Type your response here..."></textarea>
        </div>
        <div class="text-right">
            <button type="submit" class="px-4 py-2 bg-gray-600 rounded hover:bg-blue-600">
                Send Response
            </button>
        </div>
    </form>
</div>
