{{-- resources/views/components/table/main.blade.php --}}
@props(['hasRows' => true, 'headers' => [], 'title' => null, 'description' => null])

<div class="mt-4 my-4">

    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <table class="text-white border-collapse table-auto w-full whitespace-no-wrap table-striped relative">
        <thead>
        <tr class="underline text-left">
            @foreach($headers as $header)
                <th class="py-2 px-3 sticky top-0 text-center bg-gray-600">{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @if($hasRows)
                {{ $slot }}
            @else
                <tr>
                    <td colspan="{{ count($headers) }}" class="text-center py-4 text-gray-500">No records</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>


