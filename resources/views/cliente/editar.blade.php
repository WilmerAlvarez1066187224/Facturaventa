<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>
    <!-- En el encabezado de tu archivo HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-u6uWQR0oLxlptZBw1zvHJlCFvffZZ9wl9vO+0a6YWdC+doM4b/EC1PVRpujHp8Y8" crossorigin="anonymous">


    <div class="py-12">
        <x-success-status class="mb-4" :status="session('success')" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="POST">
                    @csrf
                    @method('PUT') 
                    <!-- Resto de los campos del formulario -->


                    <div>
                        <x-input-label for="nombre" :value="__('Nombres')" />
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" value="{{ $cliente->nombre }}"  autocomplete="nombre" />
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="apellido" :value="__('Apellidos')" />
                        <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" value="{{ $cliente->apellido }}"  autocomplete="apellido" />
                        <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="telefono" :value="__('Telefono')" />
                        <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" value="{{ $cliente->telefono }}"  autocomplete="telefono" />
                        <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                    </div> 

                    <div>
                        <x-input-label for="direccion" :value="__('Direccion')" />
                        <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" value="{{ $cliente->direccion }}"  autocomplete="direccion" />
                        <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="correo" :value="__('Correo')" />
                        <x-text-input id="correo" class="block mt-1 w-full" type="text" name="correo" value="{{ $cliente->correo }}"  autocomplete="correo" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div> 

                    <div>
                        <x-input-label for="cedula" :value="__('Cedula')" />
                        <x-text-input id="cedula" class="block mt-1 w-full" type="text" name="cedula" value="{{ $cliente->cedula }}"  autocomplete="cedula" />
                        <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
                    </div> 

                    <div class="mt-4 flex">
    <x-primary-button class="ml-4">
        {{ __('Actualizar Cliente') }}
    </x-primary-button>

    <a href="{{ route('cliente.index') }}" class="flex items-center text-gray-500 hover:underline focus:outline-none focus:underline transition animate-bounce ml-4">
        <i class="fas fa-arrow-left mr-2"></i> <!-- Ícono de flecha izquierda de Font Awesome -->
        {{ __('Regresar') }}
    </a>
</div>
               </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
