<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

 

    <div class="py-12">
    
   

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-4 px-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          
        <form action="{{ route('cliente.store') }}" method="POST">
             @csrf

                <div>
                    <x-input-label for="nombre" :value="__('Nombres')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"  autocomplete="nombre" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="apellido" :value="__('Apellidos')" />
                    <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')"   autocomplete="apellido" />
                    <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="telefono" :value="__('Telefono')" />
                    <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')"   autocomplete="telefono" />
                    <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                </div> 

                
                <div>
                    <x-input-label for="direccion" :value="__('Direccion')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')"   autocomplete="direccion" />
                    <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="correo" :value="__('Correo')" />
                    <x-text-input id="correo" class="block mt-1 w-full" type="text" name="correo" :value="old('correo')"   autocomplete="correo" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div> 

               
                <div>
                    <x-input-label for="cedula" :value="__('Cedula')" />
                    <x-text-input id="cedula" class="block mt-1 w-full" type="text" name="cedula" :value="old('cedula')"  autocomplete="cedula" />
                    <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
                </div> 

                <div class=" mt-4">

                <x-primary-button class="ml-4">
                        {{ __('Guardar Cliente') }}
                    </x-primary-button>
               

    
                </div>
                </form>
                                
                </div>
        </div>
    </div>

</x-app-layout>




                




                    

               


