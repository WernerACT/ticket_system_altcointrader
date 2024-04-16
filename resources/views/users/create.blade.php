<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <x-form submit="{{route('users.store')}}">

                    <x-slot name="title">
                        {{ __('Create User') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Create a user that will either serve as an administrator or agent.') }}
                    </x-slot>

                    <x-slot name="form">

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Name and Surname" required/>
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" name="email" type="email" class="mt-1 block w-full" placeholder="name@example.test" required/>
                            <x-input-error for="email" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="role_id" value="{{ __('Role') }}" />
                            <x-select-dropdown class="bg-gray-900" name="role_id" :options="$roles->pluck('name', 'id')" :multiple="false" :selected="[]"/>
                            <x-input-error for="role_id" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="department_id" value="{{ __('Department') }}" />
                            <x-select-dropdown class="bg-gray-900" name="department_id" :options="$departments->pluck('name', 'id')" :multiple="false" :selected="[]"/>
                            <x-input-error for="department_id" class="mt-2" />
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
