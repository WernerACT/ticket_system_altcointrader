<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Status') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-form submit="{{route('statuses.store')}}">

                <x-slot name="title">
                    {{ __('Create Status') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Create a new status that you can assign users too.') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Status Name" required/>
                        <x-input-error for="name" class="mt-2" />
                    </div>
                </x-slot>

                <x-slot name="actions">
                    <x-button>
                        {{ __('Create') }}
                    </x-button>
                </x-slot>

            </x-form>

            <x-section-border />
        </div>
    </div>
</x-app-layout>
