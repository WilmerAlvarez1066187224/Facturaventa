<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Factura') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <x-success-status class="mb-4" :status="session('message')" />

   

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div>
                    <x-input-label for="cantidad" :value="__('Cantidad')" />
                    <x-text-input id="cantidad" class="block mt-1 w-full" type="text" name="cantidad" :value="old('cantidad')" required autofocus autocomplete="cantidad" />
                    <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="descripcion" :value="__('Descripcion')" />
                    <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="descripcion" :value="old('descripcion')" required autofocus autocomplete="descripcion" />
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>

                
                <div>
                    <x-input-label for="valor_unitario" :value="__('Valor_Unitario')" />
                    <x-text-input id="valor_unitario" class="block mt-1 w-full" type="text" name="valor_unitario" :value="old('valor_unitario')" required autofocus autocomplete="valor_unitario" />
                    <x-input-error :messages="$errors->get('valor_unitario')" class="mt-2" />
                </div>
                

                <div>
                    <x-input-label for="valor_total" :value="__('Valor_Total')" />
                    <x-text-input id="valor_total" class="block mt-1 w-full" type="text" name="valor_total" :value="old('valor_total')" required autofocus autocomplete="valor_total" />
                    <x-input-error :messages="$errors->get('valor_total')" class="mt-2" />
                </div> 
                

                <div>
                    <x-input-label for="total" :value="__('Total')" />
                    <x-text-input id="total" class="block mt-1 w-full" type="text" name="total" :value="old('total')" required autofocus autocomplete="total" />
                    <x-input-error :messages="$errors->get('total')" class="mt-2" />
                </div> 

                <div>
                    <x-input-label for="abono" :value="__('Abono')" />
                    <x-text-input id="abono" class="block mt-1 w-full" type="text" name="abono" :value="old('abono')" required autofocus autocomplete="abono" />
                    <x-input-error :messages="$errors->get('abono')" class="mt-2" />
                </div> 

                <div class="form-group">
                    <label for="cliente_id" class="block font-medium text-sm text-gray-700">Seleccionar cliente:</label>
                     <select name="" id="" class="form-select mt-1 block w-full">
                       


                   </select> 
                </div>

                <div class=" mt-4">

                <x-primary-button class="ml-4">
                        {{ __('Guardar Factura') }}
                    </x-primary-button>

                </div>

                                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




                




                    

               


