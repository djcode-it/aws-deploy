<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Awesome Todos') }}
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-7xl mx-auto lg:px-60 px-2 sm:px-6 lg:px-8">

            <div>
                <x-success-any/>

                <x-errors-any/>
            </div>

            <x-todo-create-header/>

            <div class="py-4 overflow-hidden">
                <x-todo-table/>
            </div>
        </div>
    </div>
</x-app-layout>
