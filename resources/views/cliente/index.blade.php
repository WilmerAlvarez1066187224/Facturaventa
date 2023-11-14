
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tabla') }}
        </h2>
    </x-slot>




    <div class="py-12">

    

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">

                    <div class="flex flex-row-reverse py-4 px-4">
                        <div>
                            <a href="{{ route('cliente.create') }}"
                                type="button"
                                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                                >
                                    Añadir Cliente
                            </a>
                        </div>
                    </div>


                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Apellido</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Teléfono</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Correo</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Dirección</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Cedula</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Acciones</th>
            
        </tr>
    </thead>

    <tbody class="divide-y divide-gray-100 border-t border-gray-100">

    @foreach($clientes as $cliente)

    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4">
            <div class="flex gap-3 items-center">
                <div class="relative h-10 w-10">
                    <img
                        class="h-full w-full rounded-full object-cover object-center"
                        src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                    />
                    <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                </div>
                <div class="text-sm">
                    <div class="font-medium text-gray-700">{{$cliente->nombre}}</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-4">
            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                <span class="h-1.5 w-1.5 rounded-full bg-green-600">{{$cliente->apellido}}</span>
            </span>
        </td>
        <td class="px-6 py-4">{{$cliente->telefono}}</td>
        <td class="px-6 py-4">
            <div class="flex gap-2">
                <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">{{ $cliente->correo }}</span>
            </div>
        </td>
        <td class="px-6 py-4">{{$cliente->direccion}}</td>
        <td class="px-6 py-4">{{$cliente->cedula}}</td>
        <td class="px-6 py-4">
            <div class="flex justify-between gap-4">
                <div class="flex gap-2">
                <form id="delete-form-{{ $cliente->id }}" action="{{ route('cliente.delete', ['cliente' => $cliente->id]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>

               <a href="#" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que deseas eliminar este cliente?')) { document.getElementById('delete-form-{{ $cliente->id }}').submit(); }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                </a>

                        <a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                            <!-- Agrega aquí el código SVG para el icono de edición -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        </a>
                      

                </div>
            </div>
        </td>
    </tr>
@endforeach

    </tbody>
</table>

<div class="flex flex-row-reverse py-4 px-4">
<div>
{{ $clientes->links() }}
</div>
</div>

                  

                </div>

            </div>
        </div>

    </div>



</x-app-layout>