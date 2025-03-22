<?php
// Incluir configuración de caracteres
header('Content-Type: text/html; charset=utf-8');

// Incluir archivos de conexión y sesión
include '../conexion/conexion.php';
include '../conexion/sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Factura</title>

    <!-- Bibliotecas necesarias para Bootstrap -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Estilos personalizados -->
    <style>
        .sombra {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        input[readonly] {
            background-color: #e0e0e0; /* Color gris */
            color: #666; /* Texto en gris oscuro */
            border: 1px solid #ccc; /* Borde gris */
            cursor: not-allowed; /* Cursor de no permitido */
        }
        .form-container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        .btn-actions {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    // Verificar si el usuario es administrador o no
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
        // Mostrar bloque para usuarios que no son administradores
        echo '<div class="container-fluid">
                <div class="alert alert-info sombra">
                    <h3>Formulario de Ventas</h3> 
                    <div class="row">
                        <div class="col">
                            <a href="inicio_operador.php" class="btn btn-dark">Regresar</a> 
                            <span> Usuario: ' . $_SESSION['usuario'] . '</span>
                        </div> 
                        <div class="col"></div>
                        <div class="col"><p id="fechaHora"></p></div>  
                    </div>
                </div>
            </div>
            <hr>';
    } else {
        // Mostrar bloque para administradores
        ?>
        <div class="container-fluid">
            <div class="alert alert-info sombra">
                <h3>Crear Factura</h3> 
                <div class="row">
                    <div class="col">
                        <a href="inicio_admin.php" class="btn btn-dark">Regresar</a>
                        <span> Usuario: <?php echo $_SESSION['usuario']; ?></span>
                    </div> 
                    <div class="col"></div>
                    <div class="col"><p id="fechaHora"></p></div>  
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="container-fluid sombra">
        <!-- Consulta para verificar si hay una factura abierta -->
        <?php
        // Consultar la última factura en proceso
        $sql_2 = "SELECT * FROM ventas WHERE factura_venta = (SELECT MAX(factura_venta) FROM ventas)";
        $sql_4 = "SELECT * FROM facturas WHERE no_factura = (SELECT MAX(no_factura) FROM facturas)";
        $resultado_2 = mysqli_query($conexion, $sql_2);
        $resultado_4 = mysqli_query($conexion, $sql_4);

        if ($resultado_4 && mysqli_num_rows($resultado_4) > 0) {
            $fila = mysqli_fetch_assoc($resultado_4);
            $no_factura = $fila['no_factura'];
        }

        if ($resultado_2 && mysqli_num_rows($resultado_2) > 0) {
            $fila = mysqli_fetch_assoc($resultado_2);
            $ultima_factura = $fila['factura_venta'];
        } else {
            echo "No se encontraron filas con el número de factura más alto en la tabla ventas.";
        }

        // Verificar si la última factura coincide con la factura en proceso
        if ($ultima_factura == $no_factura) {
            ?>
            <div id="factura" class="container-fluid">
                <div class="alert alert-success" role="alert">
                    Iniciar factura <?php echo (int)$no_factura + 1; ?>!
                </div>
            </div>
            <script>
                // Actualizar el valor del campo factura_venta
                document.getElementById('factura_venta').value = '<?php echo (int)$no_factura + 1; ?>';
            </script>
            <?php
        } else {
            ?>
            <div id="factura" class="container-fluid">
                <div class="alert alert-danger" role="alert">
                    La Factura <?php echo $ultima_factura; ?> está en proceso!
            </div>
            <script>
                // Actualizar el valor del campo factura_venta
                document.getElementById('factura_venta').value = '<?php echo $ultima_factura; ?>';
            </script>
            <?php
        }
        ?>
        <?php
        // Procesar el formulario de venta
        if (isset($_POST['submit'])) {
            $factura_venta = $_POST['factura_venta'];
            $nom_cliente = $_POST['nom_cliente'];
            $doc_cliente_venta_2 = $_POST['doc_cliente_venta_2'];
            $valor_total_venta = $_POST['valor_total_venta'];
            $asesor_venta = $_POST['asesor_venta'];
            $caja = $_POST['caja'];
            $forma_de_pago = $_POST['forma_de_pago'];
            $unidades_venta = $_POST['unidades_venta'];
            $producto_venta = $_POST['producto_venta'];
            $valor_producto = $_POST['valor_producto'];
            $ref_prod_venta_2 = $_POST['ref_prod_venta_2'];
            $cat_producto = $_POST['cat_producto'];
            $diferencia_producto = $_POST['diferencia_producto'];

            // Insertar datos en la tabla ventas
            $sql = "INSERT INTO ventas (factura_venta, nom_cliente, doc_cliente_venta, valor_total_venta, caja, asesor_venta, forma_de_pago, unidades_venta, producto_venta, valor_producto, ref_prod_venta) 
                    VALUES ('$factura_venta', '$nom_cliente', '$doc_cliente_venta_2', $valor_total_venta, '$caja', '$asesor_venta', '$forma_de_pago', $unidades_venta, '$producto_venta', '$valor_producto','$ref_prod_venta_2')";
            if ($conexion->query($sql) === TRUE) {
                echo '<script>alert("Producto agregado al la factura");location.assign("../vistas/factura_borrador.php");</script>';

                // Actualizar el stock del producto
                $sql_1 = "UPDATE productos SET ref_producto='$ref_prod_venta_2', cat_producto='$cat_producto', descripcion_producto='$producto_venta', valor_producto='$valor_producto', unidades_producto='$diferencia_producto' WHERE ref_producto='$ref_prod_venta_2'";
                $resultado = mysqli_query($conexion, $sql_1);
                if ($resultado) {
                    echo "<script> alert ('Stock actualizado'); </script>";
                } else {
                    echo "<script> alert ('ERROR: Los datos no fueron actualizados '); </script>";
                }
            }
            $conexion->close();
        } else {
            ?>
            <div class="form-container">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" onsubmit="return validarFormulario()">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-danger btn-sm" onclick="limpiarFormulario()">Limpiar Formulario</button>
                            <a class="btn btn-info btn-sm" href="admin_cliente_factura.php">Administrar Cliente</a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#clientesModal">Ver Clientes</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <label for="doc_cliente_venta">Buscar cliente</label>
                            <input type="text" id="doc_cliente_venta" placeholder="Cédula" name="doc_cliente_venta" maxlength="10" pattern="[0-9]{1,10}" oninput="this.value = this.value.replace(/\D/g, ''); buscarCliente();">
                            
                        </div>
                    </div>
<hr>
                    <!-- Modal de Clientes -->
                    <div class="modal fade" id="clientesModal" tabindex="-1" role="dialog" aria-labelledby="clientesModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="clientesModalLabel">Listado de Clientes</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <!-- Tabla de clientes -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID Cliente</th>
                                                    <th>Nombre</th>
                                                    <th>Documento</th>
                                                    <th>Celular 1</th>
                                                    <th>Celular 2</th>
                                                    <th>Dirección</th>
                                                    <th>Correo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Consulta para obtener todos los clientes
                                                $consulta_clientes = "SELECT id_cliente, nom_cliente, doc_cliente, cel1_cliente, cel2_cliente, direccion_cliente, correo_cliente FROM clientes";
                                                $resultado_clientes = mysqli_query($conexion, $consulta_clientes);
                                                if (mysqli_num_rows($resultado_clientes) > 0) {
                                                    while ($fila_cliente = mysqli_fetch_assoc($resultado_clientes)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $fila_cliente["id_cliente"] . "</td>";
                                                        echo "<td>" . $fila_cliente["nom_cliente"] . "</td>";
                                                        echo "<td>" . $fila_cliente["doc_cliente"] . "</td>";
                                                        echo "<td>" . $fila_cliente["cel1_cliente"] . "</td>";
                                                        echo "<td>" . $fila_cliente["cel2_cliente"] . "</td>";
                                                        echo "<td>" . $fila_cliente["direccion_cliente"] . "</td>";
                                                        echo "<td>" . $fila_cliente["correo_cliente"] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='7' class='text-center'>No hay clientes disponibles</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Campos del formulario -->
                    <div class="form-group">
                        <label for="ref_prod_venta">Referencia</label>
                        <input class="form-control-sm"type="text" size="5" id="ref_prod_venta" name="ref_prod_venta" oninput="if(this.value.length > 4) this.value = this.value.slice(0,4); buscarProducto();">
                        <label for="unidades_venta">Unidades</label>
                        <input class="form-control-sm"type="text" size="5" id="unidades_venta" name="unidades_venta" min="1" max="99" oninput="if(this.value.length > 2) this.value = this.value.slice(0,2); this.value = this.value.replace(/\D/g, ''); calcularDiferencia(); calcularValorTotalVenta();">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#productosModal">Ver Productos</button>
                        <label for="unidades_producto">Stock</label>
                        <input class="form-control-sm" type="text" size="5" id="unidades_producto" name="unidades_producto" readonly>
                        <label for="diferencia_producto">Diferencia</label>
                        <input class="form-control-sm" type="text" size="5" id="diferencia_producto" name="diferencia_producto" readonly>
                    </div>

                    <!-- Modal de Productos -->
                    <div class="modal fade" id="productosModal" tabindex="-1" role="dialog" aria-labelledby="productosModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productosModalLabel">Listado de Productos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Tabla de productos -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID Producto</th>
                                                    <th>Referencia</th>
                                                    <th>Descripción</th>
                                                    <th>Categoría</th>
                                                    <th>Valor</th>
                                                    <th>Unidades</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Consulta para obtener todos los productos
                                                $consulta_productos = "SELECT id_producto, ref_producto, descripcion_producto, cat_producto, valor_producto, unidades_producto FROM productos";
                                                $resultado_productos = mysqli_query($conexion, $consulta_productos);
                                                if (mysqli_num_rows($resultado_productos) > 0) {
                                                    while ($fila_producto = mysqli_fetch_assoc($resultado_productos)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $fila_producto["id_producto"] . "</td>";
                                                        echo "<td>" . $fila_producto["ref_producto"] . "</td>";
                                                        echo "<td>" . $fila_producto["descripcion_producto"] . "</td>";
                                                        echo "<td>" . $fila_producto["cat_producto"] . "</td>";
                                                        echo "<td>" . $fila_producto["valor_producto"] . "</td>";
                                                        echo "<td>" . $fila_producto["unidades_producto"] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='6' class='text-center'>No hay productos disponibles</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="caja">Caja</label>
                        <select class="form-control-sm" id="caja" name="caja" class="form-select">
                            <?php 
                            for ($i = 1; $i <= 5; $i++) {
                                $selected = ($fila['caja'] == $i) ? 'selected' : ''; 
                                echo "<option value='$i' $selected>$i</option>";
                            }
                            ?>
                        </select>
                        <label for="forma_de_pago">Forma de Pago</label>
                        <select class="form-control-sm"id="forma_de_pago" name="forma_de_pago" class="form-select">
                            <option value="Efectivo" <?php echo ($fila['forma_de_pago'] == 'Efectivo') ? 'selected' : ''; ?>>Efectivo</option>
                            <option value="Tarjeta" <?php echo ($fila['forma_de_pago'] == 'Tarjeta') ? 'selected' : ''; ?>>Tarjeta</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="doc_cliente_venta_2">Documento Cliente:</label>
                        <input class="form-control-sm" type="text" size="10" id="doc_cliente_venta_2" name="doc_cliente_venta_2" value="<?php echo $fila['doc_cliente_venta']; ?>" readonly>
                        <label for="nom_cliente">Nombre Cliente</label>
                        <input class="form-control-sm" type="text" size="40" id="nom_cliente" value="<?php echo $fila['nom_cliente']; ?>" readonly name="nom_cliente">
                    </div>

                    <div class="form-group">
                        <label for="factura_venta">Factura de Venta</label>
                        <input class="form-control-sm" size="6" type="text" id="factura_venta" name="factura_venta" value="<?php echo (int)$no_factura + 1; ?>" readonly>
                        <label for="asesor_venta">Asesor</label>
                        <input class="form-control-sm" type="text" id="asesor_venta" name="asesor_venta" value="<?php echo $_SESSION['usuario'];?>" readonly>
                        <label for="fecha_hora_venta">Fecha y Hora de Venta</label>
                        <input class="form-control-sm" type="datetime-local" size="15" id="fecha_hora_venta" name="fecha_hora_venta" value="<?php echo date('Y-m-d\TH:i'); ?>" readonly>
                    </div>

                   
                    <div class="form-group">
                        <label class="form-control-sm" for="ref_prod_venta_2">Referencia</label>
                        <input type="text" size="5" id="ref_prod_venta_2" readonly name="ref_prod_venta_2">
                        <label class="form-control-sm" for="producto_venta">Producto</label>
                        <input type="text" id="producto_venta" name="producto_venta" readonly>
                        <label class="form-control-sm" for="cat_producto">Categoría</label>
                        <input type="text" id="cat_producto" name="cat_producto" readonly>
                    </div>

                    <div class="form-group">
                        <label for="valor_producto">Valor Unidad</label>
                        <input class="form-control-sm" type="number" step="0.01" id="valor_producto" name="valor_producto" readonly oninput="calcularValorTotalVenta()">
                        <label for="valor_total_venta">Sub Total</label>
                        <input class="form-control-sm" size="5" type="number" step="0.01" id="valor_total_venta" name="valor_total_venta" readonly>
                    </div>

                    <div class="btn-actions">
                        <button type="submit" name="submit" class="btn btn-success" onclick="return validarCampos();">Agregar a la Factura</button>
                        <a href="../procesos_factura_admin/validar_factura.php" class="btn btn-primary">Ver Factura</a>
                    </div>
                </form>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- Scripts -->
    <script>
        function validarCampos() {
            var factura_venta = document.getElementById("factura_venta").value;
            var nom_cliente = document.getElementById("nom_cliente").value;
            var valor_total_venta = document.getElementById("valor_total_venta").value;
            var caja = document.getElementById("caja").value;
            var fecha_hora_venta = document.getElementById("fecha_hora_venta").value;
            var asesor_venta = document.getElementById("asesor_venta").value;
            var forma_de_pago = document.getElementById("forma_de_pago").value;
            var unidades_venta = document.getElementById("unidades_venta").value;
            var producto_venta = document.getElementById("producto_venta").value;
            var valor_producto = document.getElementById("valor_producto").value;
            var ref_prod_venta_2 = document.getElementById("ref_prod_venta_2").value;

            if (fecha_hora_venta === "" || factura_venta === "" || nom_cliente === "" || valor_total_venta === "" || caja === "" || asesor_venta === "" || forma_de_pago === "" || unidades_venta === "" || producto_venta === "" || valor_producto === "" || ref_prod_venta_2 === "") {
                alert("Debe llenar todos los campos.");
                return false;
            }
            return preguntarRegistrarVenta();
        }

        function nueva_venta() {
            $.ajax({
                url: '../procesos_factura_admin/id_factura.php',
                method: 'GET',
                success: function(response) {
                    var ultimoId = parseInt(response);
                    var nuevoId = (ultimoId + 1);
                    document.getElementById("factura_venta").value = nuevoId;
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function confirmarCancelarVenta() {
            if (window.confirm("¿Está seguro que desea cancelar la venta y borrar todos los datos?")) {
                location.reload();
            }
        }

        function preguntarRegistrarVenta() {
            var confirmacion = confirm("¿Desea registrar la venta?");
            return confirmacion;
        }

        function buscarCliente() {
            event.preventDefault();
            var doc_cliente_venta = $('#doc_cliente_venta').val();
            $.ajax({
                type: 'POST',
                url: '../procesos_factura_admin/buscar_cliente.php',
                data: { doc_cliente_venta: doc_cliente_venta },
                dataType: 'json',
                success: function(response) {
                    $('#nom_cliente').val(response.nom_cliente);
                    $('#doc_cliente_venta_2').val(response.doc_cliente);
                },
                error: function() {
                    alert('Error al buscar el cliente.');
                }
            });
        }

        function buscarProducto() {
            event.preventDefault();
            var ref_prod_venta = $('#ref_prod_venta').val();
            $.ajax({
                type: 'POST',
                url: '../procesos_factura_admin/buscar_referencia.php',
                data: { ref_prod_venta: ref_prod_venta },
                dataType: 'json',
                success: function(response) {
                    $('#producto_venta').val(response.descripcion_producto);
                    $('#valor_producto').val(response.valor_producto);
                    $('#unidades_producto').val(response.unidades_producto);
                    $('#ref_prod_venta_2').val(response.ref_producto);
                    $('#cat_producto').val(response.cat_producto);
                },
                error: function() {
                    alert('Error al buscar el producto.');
                }
            });
        }

        function agregarAlCarrito() {
            var unidadesVentaInput = document.getElementById("unidades_venta");
            var refProdInput = document.getElementById("ref_prod_venta_2");
            var productoInput = document.getElementById("producto_venta");
            var valorProductoInput = document.getElementById("valor_producto");
            var unidadesProductoInput = document.getElementById("unidades_producto");
            var catProductoInput = document.getElementById("cat_producto");

            if (
                unidadesVentaInput.value.trim() === "" ||
                refProdInput.value.trim() === "" ||
                productoInput.value.trim() === "" ||
                valorProductoInput.value.trim() === "" ||
                unidadesProductoInput.value.trim() === "" ||
                catProductoInput.value.trim() === ""
            ) {
                alert("Por favor, completa todos los campos.");
                return;
            }

            var unidadesVenta = parseInt(unidadesVentaInput.value);
            var refProd = refProdInput.value;
            var producto = productoInput.value;
            var valorProducto = parseFloat(valorProductoInput.value);
            var unidadesProducto = parseInt(unidadesProductoInput.value);
            var catProducto = catProductoInput.value;

            if (isNaN(unidadesVenta) || unidadesVenta <= 0) {
                alert("Por favor, ingresa un número válido de unidades.");
                return;
            }

            var nuevoStock = unidadesProducto - unidadesVenta;
            if (nuevoStock >= 0) {
                unidadesProductoInput.value = nuevoStock;
            } else {
                alert("No hay stock disponible.");
                return;
            }

            var tabla = document.getElementById("tablaItems");
            var fila = tabla.insertRow();

            var celdaRefProd = fila.insertCell(0);
            var celdaCatProducto = fila.insertCell(1);
            var celdaProducto = fila.insertCell(2);
            var celdaUnidadesVenta = fila.insertCell(3);
            var celdaValorTotal = fila.insertCell(4);
            var celdaEliminar = fila.insertCell(5);

            celdaRefProd.innerHTML = refProd;
            celdaCatProducto.innerHTML = catProducto;
            celdaProducto.innerHTML = producto;
            celdaUnidadesVenta.innerHTML = unidadesVenta;
            celdaValorTotal.innerHTML = (unidadesVenta * valorProducto).toFixed(2);

            var botonEliminar = document.createElement("button");
            botonEliminar.innerText = "Eliminar";
            botonEliminar.onclick = function() {
                tabla.deleteRow(fila.rowIndex);
                calcularTotales();
            };
            celdaEliminar.appendChild(botonEliminar);

            calcularTotales();

            unidadesVentaInput.value = "";
            refProdInput.value = "";
            productoInput.value = "";
            valorProductoInput.value = "";
            catProductoInput.value = "";
        }

        function calcularTotales() {
            var tabla = document.getElementById("tablaItems");
            var totalVenta = 0;
            var filas = tabla.rows.length;

            for (var i = 1; i < filas; i++) {
                var valorTotalCelda = tabla.rows[i].cells[4].innerHTML;
                totalVenta += parseFloat(valorTotalCelda);
            }

            var valorIVA = totalVenta * 0.19;
            document.getElementById("valor_iva").innerText = valorIVA.toFixed(2);
            document.getElementById("valor_total_venta").innerText = (totalVenta + valorIVA).toFixed(2);
        }

        function calcularValorTotalVenta() {
            var unidadesVentaInput = document.getElementById("unidades_venta");
            var valorProductoInput = document.getElementById("valor_producto");
            var valorTotalVentaInput = document.getElementById("valor_total_venta");

            var unidadesVenta = parseInt(unidadesVentaInput.value);
            var valorProducto = parseFloat(valorProductoInput.value);

            var valorTotalVenta = unidadesVenta * valorProducto;
            valorTotalVentaInput.value = valorTotalVenta.toFixed(2);
        }

        function limpiarFormulario() {
            document.getElementById("doc_cliente_venta").value = "";
            document.getElementById("doc_cliente_venta_2").value = "";
            document.getElementById("nom_cliente").value = "";
            document.getElementById("caja").value = "";
            document.getElementById("forma_de_pago").value = "";
            document.getElementById("unidades_venta").value = "";
            document.getElementById("ref_prod_venta").value = "";
            document.getElementById("producto_venta").value = "";
            document.getElementById("cat_producto").value = "";
            document.getElementById("valor_producto").value = "";
            document.getElementById("valor_total_venta").value = "";
        }

        function calcularDiferencia() {
            var unidadesProducto = parseInt(document.getElementById('unidades_producto').value);
            var unidadesVenta = parseInt(document.getElementById('unidades_venta').value);
            var diferencia = unidadesProducto - unidadesVenta;
            document.getElementById('diferencia_producto').value = isNaN(diferencia) ? '' : diferencia;
        }

        function validarFormulario() {
            var diferencia = parseFloat(document.getElementById('diferencia_producto').value);
            if (diferencia < 0) {
                alert('No hay stock disponible.');
                return false;
            }
            return true;
        }

        function actualizarFechaHora() {
            var fechaHoraActual = new Date();
            fechaHoraActual.setHours(fechaHoraActual.getHours() - 5);
            var fechaHoraFormateada = fechaHoraActual.toISOString().slice(0, 16).replace('T', ' ');
            document.getElementById('fecha_hora_venta').value = fechaHoraFormateada;
        }

        setInterval(actualizarFechaHora, 1000);
    </script>
</body>
</html>