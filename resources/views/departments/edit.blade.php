<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Department: ') . $department->name }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-section-border />
            <x-form submit="{{route('departments.update', $department)}}">

                <x-slot name="title">
                    {{ __('User') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Edit the name of the department as listed on the system') }}
                </x-slot>

                <x-slot name="form">

                    @method('PUT')

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $department->name }}"/>
                        <x-input-error for="name" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-button>
                        {{ __('Update') }}
                    </x-button>
                </x-slot>

            </x-form>

            <x-section-border />
        </div>
    </div>
</x-app-layout>


