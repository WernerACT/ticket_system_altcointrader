{{-- resources/views/components/table/cell.blade.php --}}
@props(['cell' => null])

<td class="text-center py-2 px-3border-gray-100">
    @if($cell)
        {{ $cell }}
    @else
        {{ $slot }}
    @endif
</td>
