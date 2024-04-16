    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User: ') . $user->name }}
            </h2>
        </x-slot>

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-section-border />
                <x-success-message />
                <x-form submit="{{route('users.store')}}">

                    <x-slot name="title">
                        {{ __('User') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Details of the user as listed on the system') }}
                    </x-slot>

                    <x-slot name="form">

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $user->name }}"  readonly/>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ $user->email }}" readonly/>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="role" value="{{ __('Role') }}" />
                            <x-input id="role" name="role" type="text" class="mt-1 block w-full" value="{{ $user->role->name }}" readonly/>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="department" value="{{ __('Department') }}" />
                            <x-input id="department" name="role" type="text" class="mt-1 block w-full" value="{{ $user->department->name }}" readonly/>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="role" value="{{ __('Date Added: ') }}" />
                            <x-input id="role" name="role" type="text" class="mt-1 block w-full" value="{{ $user->created_at }}" readonly/>
                        </div>

                    </x-slot>
                </x-form>

                <x-section-border />
            </div>
        </div>
    </x-app-layout>


