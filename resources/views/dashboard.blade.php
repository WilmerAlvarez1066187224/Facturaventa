<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
        <!-- Ventas por Mes -->
        <div class="flex-1 bg-blue-200 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
            <h2 class="text-xl font-semibold mb-4">Ventas por Mes</h2>
            <p class="text-gray-700">Total de ventas este mes: <span class="font-bold text-blue-500">$150</span></p>
            <!-- Otros detalles o gráficos relacionados con las ventas por mes -->
        </div>

        <!-- Ventas por Día -->
        <div class="flex-1 bg-green-200 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
            <h2 class="text-xl font-semibold mb-4">Ventas por Día</h2>
            <p class="text-gray-700">Ventas hoy: <span class="font-bold text-green-500">$20</span></p>
            <!-- Otros detalles o gráficos relacionados con las ventas por día -->
        </div>

        <!-- Ventas por Año -->
        <div class="flex-1 bg-yellow-200 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
            <h2 class="text-xl font-semibold mb-4">Ventas por Año</h2>
            <p class="text-gray-700">Ventas este año: <span class="font-bold text-yellow-500">$1200</span></p>
            <!-- Otros detalles o gráficos relacionados con las ventas por año -->
        </div>



        <!-- Cliente que más compró en el mes -->
        <div class="flex-1 bg-purple-200 p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
            <h2 class="text-xl font-semibold mb-4">Cliente Top del Mes</h2>
            <p class="text-gray-700">Nombre del Cliente: <span class="font-bold text-purple-500">Cliente XYZ</span></p>
            <p class="text-gray-700">Total Comprado: <span class="font-bold text-purple-500">$300</span></p>
            <!-- Otros detalles o gráficos relacionados con el cliente que más compró -->
        </div>

    </div>
</x-app-layout>
