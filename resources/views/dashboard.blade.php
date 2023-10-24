<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="rounded-lg bg-blue-100 p-4 mb-4">
                        <p class="text-2xl font-semibold text-blue-800">Resumen de Ventas del Mes</p>
                        <p class="text-lg text-blue-600">Ventas realizadas en el mes: <span class="font-bold"></span></p>
                    </div>
                    <p class="text-gray-700">{{ __("¡Ya has iniciado sesión!") }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

