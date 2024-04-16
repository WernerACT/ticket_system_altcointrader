<div x-data="{
    open: false,
    imgModal: false,
    imgUrl: '',
    imageId: null,
    imageType: 'selfie',
    imageValid: false,
    submitImageUpdate() {
        axios.post('/images/update', {
            id: this.imageId,
            type: this.imageType,
            valid: this.imageValid
        })
        .then(response => {
            this.imgModal = false;
            // Display a success message
            alert('Image updated successfully!');
        })
        .catch(error => {
            console.error('Error updating image:', error);
            alert('Failed to update image.');
        });
    }
}">
    <button @click="open = !open" class="w-full px-4 py-2 text-left text-white bg-gray-700 hover:bg-gray-600">
        Ticket Images ({{ count($images) }})
    </button>
    <div x-show="open" class="bg-gray-900 p-4">
        <table class="w-full text-white">
            @if(count($images) > 0)
                <thead class="text-left">
                <tr>
                    <th>Name</th>
                    <th>Created Date</th>
                </tr>
                </thead>
            @endif
            <tbody>
            @forelse($images as $image)
                <tr class="hover:bg-blue-700 cursor-pointer" @click="imgUrl = '{{ route('images.show', $image->id) }}'; imgModal = true; imageId = {{ $image->id }}">
                    <td>{{ $image->name }}</td>
                    <td>{{ $image->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No images available.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <!-- Image Modal -->
    <div x-show="imgModal" @click.away="imgModal = false" class="fixed inset-0 bg-gray-800 bg-opacity-50 overflow-y-auto h-full w-full flex justify-center items-center">
        <div class="modal-content bg-gray-900 p-3">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">{{ __('Image Preview and Update') }}</p>
                <div class="cursor-pointer z-50" @click="imgModal = false">
                    <i class="fa fa-times-circle text-white text-3xl"></i>
                </div>
            </div>
            <img :src="imgUrl" class="w-auto max-h-72">

            <!-- Form to update image details -->
            <form @submit.prevent="submitImageUpdate">
                <div class="mt-4">
                    <label for="imageType" class="block text-sm font-medium text-gray-200">Image Type:</label>
                    <select id="imageType" x-model="imageType" class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-700 text-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="selfie">Selfie</option>
                        <option value="proof_of_identity">Proof of Identity</option>
                        <option value="spam">Spam</option>
                    </select>
                </div>
                <div class="mt-4">
                    <label class="inline-flex items-center text-sm text-gray-200">
                        <input type="checkbox" x-model="imageValid" class="form-checkbox h-5 w-5 text-blue-600 bg-gray-800 border-gray-700 rounded">
                        <span class="ml-2">Mark as Valid</span>
                    </label>
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded text-white">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
