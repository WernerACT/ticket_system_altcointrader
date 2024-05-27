<!-- resources/views/filament/widgets/stats-overview.blade.php -->

<x-filament::widget>
    <x-filament::card>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-2">
            @foreach ($this->getStats() as $stat)
                <div>
                    {{ $stat }}
                </div>
            @endforeach
        </div>
    </x-filament::card>
</x-filament::widget>
