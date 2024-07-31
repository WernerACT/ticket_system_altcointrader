<!-- resources/views/components/helpdesk/card.blade.php -->

<div class="w-1/2">
    <a href="{{ $href }}">
        <div class="text-center text-gray-700 hover:text-white bg-white hover:bg-gray-800 shadow-md rounded-lg p-4 m-2">
            <h2 class="text-xl mb-2">{{ $title }}</h2>
            <p class="mb-4">{{ $description }}</p>
        </div>
    </a>
</div>
