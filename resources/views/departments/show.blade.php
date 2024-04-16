<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User: ') . $department->name }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-section-border />
            <x-success-message />
            <x-form submit="{{route('departments.store')}}">

                <x-slot name="title">
                    {{ __('Department') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Details of the department as listed on the system') }}
                </x-slot>

                <x-slot name="form">

                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $department->name }}"  readonly/>
                    </div>









                </x-slot>
            </x-form>

            <x-section-border />
        </div>
    </div>
</x-app-layout>


