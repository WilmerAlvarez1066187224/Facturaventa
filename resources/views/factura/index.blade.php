<x-app-layout>
    <!-- ... (resto del código) ... -->
    <head>
    <!-- ... (otros elementos head) ... -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>


    <form method="POST" action="{{ route('factura.store') }}">
        @csrf

        <!-- ... (campos para la factura) ... -->

        <!-- Campos para los productos -->
        <div id="productos-container">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-4">
            <div>
    <x-input-label for="cantidad" :value="__('Cantidad')" />
    <x-text-input id="cantidad" class="block mt-1 w-full text-sm" type="text" name="productos[0][cantidad]" :value="old('productos.0.cantidad')" required autofocus autocomplete="cantidad" />
    <x-input-error :messages="$errors->get('cantidad')" class="mt-2 text-sm" />
</div>


                <div>
                    <x-input-label for="descripcion" :value="__('Descripción')" />
                    <x-text-input id="descripcion" class="block mt-1 w-full" type="text" name="productos[0][descripcion]" :value="old('productos.0.descripcion')" required autofocus autocomplete="descripcion" />
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="valor_unitario" :value="__('Valor Unitario')" />
                    <x-text-input id="valor_unitario" class="block mt-1 w-full" type="text" name="productos[0][valor_unitario]" :value="old('productos.0.valor_unitario')" required autofocus autocomplete="valor_unitario" />
                    <x-input-error :messages="$errors->get('valor_unitario')" class="mt-2" />
                </div>

                
            </div>

            <!-- Tabla para mostrar los productos -->
            <table class="mt-4 w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300">Cantidad</th>
                        <th class="border border-gray-300">Descripción</th>
                        <th class="border border-gray-300">Valor Unitario</th>
                        <th class="border border-gray-300">Valor Total</th>
                    </tr>
                </thead>
                <tbody id="productos-tabla-body">
                    <!-- Aquí se agregarán las filas de productos dinámicamente -->
                </tbody>
            </table>

            <!-- Agregar nuevos productos -->
            <div class="flex justify-end mt-4 space-x-4">
                <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" id="agregarProducto">
                    Agregar Producto
                </button>

                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="confirmarGuardarFactura()">
                    Guardar Factura
                </button>
            </div>
        </div>

    </form>
  <!-- Agrega este elemento HTML donde quieras mostrar la sumatoria total -->
<!-- Agrega este elemento HTML donde quieras mostrar la sumatoria total -->
<div id="sumatoria-total">Sumatoria Total: $0.00</div>
<style>
    .cancelar-btn {
        padding: 5px;
        background-color: red;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 3px;
        width: 30px;  /* Ajusta el ancho según tu preferencia */
        height: 30px; /* Ajusta la altura según tu preferencia */
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cancelar-btn i {
        font-size: 14px; /* Ajusta el tamaño del icono según tu preferencia */
    }
</style>

<script>
    function confirmarGuardarFactura() {
        if (confirm('¿Desea guardar esta factura?')) {
            // Si el usuario hace clic en "Aceptar", se envía el formulario
            document.querySelector('form').submit();
        } else {
            // Si el usuario hace clic en "Cancelar" o cierra el cuadro de diálogo, no se hace nada
        }
    }

    // Código JavaScript para agregar productos dinámicamente
    let productoIndex = 1;

    document.getElementById('agregarProducto').addEventListener('click', function () {
        const cantidad = document.getElementById('cantidad').value;
        const descripcion = document.getElementById('descripcion').value;
        const valorUnitario = document.getElementById('valor_unitario').value;

        // Validar que se ingresen todos los campos
        if (cantidad && descripcion && valorUnitario) {
            // Calcular el valor total
            const valorTotal = (parseFloat(cantidad) * parseFloat(valorUnitario)).toFixed(2);

            // Formatear el valor total con punto de mil
            const valorTotalFormateado = parseFloat(valorTotal).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            // Crear una nueva fila en la tabla
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td class="border border-gray-300">${cantidad}</td>
                <td class="border border-gray-300">${descripcion}</td>
                <td class="border border-gray-300">${valorUnitario}</td>
                <td class="border border-gray-300" id="valorTotal">${valorTotalFormateado}</td>
                <td class="border border-gray-300">
                <button class="cancelar-btn" onclick="cancelarProducto(this)">
                    <i class="fas fa-times"></i>
                </button>
            </td>
        `;

            // Agregar la fila a la tabla
            document.getElementById('productos-tabla-body').appendChild(fila);

            // Limpiar valores de los campos
            document.getElementById('cantidad').value = '';
            document.getElementById('descripcion').value = '';
            document.getElementById('valor_unitario').value = '';
            document.getElementById('valor_total').value = '';
            

            // Calcular y mostrar la sumatoria total
            mostrarSumatoriaTotal();

            // Incrementar el índice para el próximo producto
            productoIndex++;
        } else {
            alert('Por favor, complete todos los campos del producto.');
        }
    });

    // Función para calcular la sumatoria total de los productos
    function calcularSumatoriaTotal() {
        const filas = document.querySelectorAll('#productos-tabla-body tr td:last-child');
        let sumatoriaTotal = 0;

        filas.forEach((fila) => {
            const valorTotal = parseFloat(fila.textContent.replace(/,/g, '')); // Eliminar comas del formato de mil
            sumatoriaTotal += valorTotal;
        });

        return sumatoriaTotal;
    }

    // Función para mostrar la sumatoria total en el elemento HTML correspondiente
    function mostrarSumatoriaTotal() {
        const sumatoriaTotal = calcularSumatoriaTotal();
        const sumatoriaTotalFormateada = sumatoriaTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        document.getElementById('sumatoria-total').textContent = `Sumatoria Total: $${sumatoriaTotalFormateada}`;
    }

    // Función para cancelar un producto
    function cancelarProducto(button) {
        const fila = button.parentNode.parentNode;
        fila.parentNode.removeChild(fila);

        // Recalcular y mostrar la sumatoria total
        mostrarSumatoriaTotal();
    }
</script><!-- ... (resto del código) ... -->

<style>
    .cancelar-btn {
        padding: 5px 10px;
        background-color: red;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
</style>

<script>
    function confirmarGuardarFactura() {
        if (confirm('¿Desea guardar esta factura?')) {
            // Si el usuario hace clic en "Aceptar", se envía el formulario
            document.querySelector('form').submit();
        } else {
            // Si el usuario hace clic en "Cancelar" o cierra el cuadro de diálogo, no se hace nada
        }
    }

    // Código JavaScript para agregar productos dinámicamente
    let productoIndex = 1;

    document.getElementById('agregarProducto').addEventListener('click', function () {
        const cantidad = document.getElementById('cantidad').value;
        const descripcion = document.getElementById('descripcion').value;
        const valorUnitario = document.getElementById('valor_unitario').value;

        // Validar que se ingresen todos los campos
        if (cantidad && descripcion && valorUnitario) {
            // Calcular el valor total
            const valorTotal = (parseFloat(cantidad) * parseFloat(valorUnitario)).toFixed(2);

            // Formatear el valor total con punto de mil
            const valorTotalFormateado = parseFloat(valorTotal).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

            // Crear una nueva fila en la tabla
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td class="border border-gray-300">${cantidad}</td>
                <td class="border border-gray-300">${descripcion}</td>
                <td class="border border-gray-300">${valorUnitario}</td>
                <td class="border border-gray-300" id="valorTotal">${valorTotalFormateado}</td>
                <td class="border border-gray-300"><button class="cancelar-btn" onclick="cancelarProducto(this)">Cancelar</button></td>
            `;

            // Agregar la fila a la tabla
            document.getElementById('productos-tabla-body').appendChild(fila);

            // Limpiar valores de los campos
            document.getElementById('cantidad').value = '';
            document.getElementById('descripcion').value = '';
            document.getElementById('valor_unitario').value = '';
            document.getElementById('valor_total').value = '';

            // Calcular y mostrar la sumatoria total
            mostrarSumatoriaTotal();

            // Incrementar el índice para el próximo producto
            productoIndex++;
        } else {
            alert('Por favor, complete todos los campos del producto.');
        }
    });

    // Función para calcular la sumatoria total de los productos
    function calcularSumatoriaTotal() {
        const filas = document.querySelectorAll('#productos-tabla-body tr td:last-child');
        let sumatoriaTotal = 0;

        filas.forEach((fila) => {
            const valorTotal = parseFloat(fila.textContent.replace(/,/g, '')); // Eliminar comas del formato de mil
            sumatoriaTotal += valorTotal;
        });

        return sumatoriaTotal;
    }

    // Función para mostrar la sumatoria total en el elemento HTML correspondiente
    function mostrarSumatoriaTotal() {
        const sumatoriaTotal = calcularSumatoriaTotal();
        const sumatoriaTotalFormateada = sumatoriaTotal.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        document.getElementById('sumatoria-total').textContent = `Sumatoria Total: $${sumatoriaTotalFormateada}`;
    }

    // Función para cancelar un producto
    function cancelarProducto(button) {
        const fila = button.parentNode.parentNode;
        fila.parentNode.removeChild(fila);

        // Recalcular y mostrar la sumatoria total
        mostrarSumatoriaTotal();
    }
</script>



</x-app-layout>





