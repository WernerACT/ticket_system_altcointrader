<!-- Display Success Message -->
@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" class="fixed bottom-0 right-0 mb-4 mr-4 z-50">
        <div class="bg-green-500 border border-green-600 text-white px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
@endif
