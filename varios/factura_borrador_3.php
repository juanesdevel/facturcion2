<?php
//seguridad de sesion

session_start();
$varsesion= $_SESSION['usuario'];
if($varsesion== null || $varsesion=='') {
  echo "No tiene Acceso";
  die();
}

?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
       
       <script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
   </head>
   <body>
   <div class="container-fluid">
   <div class="alert alert-info">
   <h3>Formulario de Ventas</h3> 
          <a href="inicio_operador.php"class="btn btn-dark">Regresar</a><span> </span><?php echo "Usuario: ".$_SESSION['usuario'];?>  </div>
          </div>
          <hr>
   
   <div class="container-fluid">
<!-- Consuta factura en proceso -->
<?php
include("conexion.php");

// Realizar la consulta para obtener todas las filas que contienen el número más alto en la columna factura_venta
$sql_2 = "SELECT * FROM ventas WHERE factura_venta = (SELECT MAX(factura_venta) FROM ventas)";
$sql_4 = "SELECT * FROM facturas WHERE no_factura = (SELECT MAX(no_factura) FROM facturas)";
$resultado_2 = mysqli_query($conexion, $sql_2);
$resultado_4 = mysqli_query($conexion, $sql_4);
if ($resultado_4) {
    if (mysqli_num_rows($resultado_4) > 0) {
        // Obtener la primera fila de resultados
        $fila = mysqli_fetch_assoc($resultado_4);
        $no_factura = $fila['no_factura'];
        
    }
}
if ($resultado_2) {
    if (mysqli_num_rows($resultado_2) > 0) {
        // Obtener la primera fila de resultados
        $fila = mysqli_fetch_assoc($resultado_2);
        $ultima_factura = $fila['factura_venta'];
       


    } else {
        echo "No se encontraron filas con el número de factura más alto en la tabla ventas.";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
if ($ultima_factura == $no_factura) {
    
    ?>
       
    <div id="factura" class="container-fluid">
        <div class="alert alert-danger" role="alert">
           La Factura <?php echo $no_factura; ?> está Cerrada!
        </div>
   </div>
    <script>
        // Cambiar el valor del input usando JavaScript
        document.getElementById('factura_venta').value = '<?php echo (int)$no_factura + 1; ?>';
        
           </script>
              
<?php

}
 else {
    ?>
    <div id="factura" class="container-fluid">
        <div class="alert alert-success" role="alert">
            Factura <?php echo $ultima_factura; ?> en Proceso
        </div>
    </div>
    <script>
        // Cambiar el valor del input usando JavaScript
        document.getElementById('factura_venta').value = '<?php echo $ultima_factura; ?>';
        
    </script>
    <?php
    

}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>


    <?php
// Recoger datos del formulario para registro de venta
if(isset($_POST['submit'])){
      include("conexion.php");
       
$factura_venta = $_POST['factura_venta'];
$nom_cliente = $_POST['nom_cliente'];
$doc_cliente_venta_2 = $_POST['doc_cliente_venta_2'];
$valor_total_venta = $_POST['valor_total_venta'];
$asesor_venta = $_POST['asesor_venta'];
$caja = $_POST['caja'];
$asesor_venta = $_POST['asesor_venta'];
$forma_de_pago = $_POST['forma_de_pago'];
$unidades_venta = $_POST['unidades_venta'];

$producto_venta = $_POST['producto_venta'];
$valor_producto = $_POST['valor_producto'];
$ref_prod_venta_2 = $_POST['ref_prod_venta_2'];
$cat_producto = $_POST['cat_producto'];
$diferencia_producto = $_POST['diferencia_producto'];


    $sql = "INSERT INTO ventas (factura_venta, nom_cliente, doc_cliente_venta, valor_total_venta, caja, asesor_venta, forma_de_pago, unidades_venta, producto_venta, valor_producto, ref_prod_venta) 
        VALUES ('$factura_venta', '$nom_cliente', '$doc_cliente_venta_2', $valor_total_venta, '$caja', '$asesor_venta', '$forma_de_pago', $unidades_venta, '$producto_venta', '$valor_producto','$ref_prod_venta_2')";
   
        if ($conexion->query($sql) === TRUE) {
            echo '<script>alert("Producto agregado al carrito");location.assign("nueva_venta_2.php");</script>';

            $sql_1 = "UPDATE productos SET ref_producto='$ref_prod_venta_2', cat_producto='$cat_producto', descripcion_producto='$producto_venta', valor_producto='$valor_producto', unidades_producto='$diferencia_producto' WHERE ref_producto='$ref_prod_venta_2'";

            $resultado = mysqli_query($conexion, $sql_1);
            if($resultado){
            echo "<script> alert ('Stock actualizado'); </script>";
            } else {
             echo "<script> alert ('ERROR: Los datos no fueron actualizados '); </script>";
            }
            }

        
    $conexion->close();
}else{
    ?> 
    
    
    

    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" onsubmit="return validarFormulario()">
    <button type="button" class="btn btn-success" onclick="limpiarFormulario()">Nueva Venta</button>
<button type="button" class="btn btn-danger" onclick="confirmarCancelarVenta()">Cancelar Venta</button> <a class="btn btn-primary" href="nuevo_cliente_factura_operador.php">Crear Cliente</a><span> </span>

<!-- <button type="button" class="btn btn-info"onclick="limpiarFormulario()">Limpiar Formulario</button>    -->

<br><br>
        <label for="factura_venta">Factura de Venta:</label>
        <input type="text" id="factura_venta" name="factura_venta" value="<?php echo (int)$no_factura + 1; ?>" readonly >
   
        <label for="fecha_hora_venta">Fecha y Hora de Venta:</label>
        <input type="date_time" size="15"id="fecha_hora_venta" name="fecha_hora_venta" value="<?php echo date('Y-m-d 11:i'); ?>"><br>
<hr>
<!-- <button onclick="buscarCliente()">Buscar</button>  -->
<label for="doc_cliente_venta">Buscar:</label>
        <input type="text" id="doc_cliente_venta" placeholder="Documento Cliente" name="doc_cliente_venta" oninput="buscarCliente()"><br><br>

        <label for="doc_cliente_venta_2">Cliente:</label>
        <input type="text" id="doc_cliente_venta_2" name="doc_cliente_venta_2" value="<?php echo $fila['doc_cliente_venta']; ?>"readonly >  
        <label for="nom_cliente">Cliente:</label>
        <input type="text" size="30" id="nom_cliente" value="<?php echo $fila['nom_cliente']; ?>"  readonly name="nom_cliente">

        
       
<hr>
               <label for="caja">Caja:</label>
        <input size="5" type="text" id="caja" name="caja" value="<?php echo $fila['caja']; ?>" >

                <label for="forma_de_pago">Forma de Pago:</label>
        <input type="text" id="forma_de_pago" name="forma_de_pago" value="<?php echo $fila['forma_de_pago']; ?>">
        <label for="asesor_venta">Asesor:</label>
        <input type="text" id="asesor_venta" name="asesor_venta" value="<?php echo $_SESSION['usuario'];?>" readonly> <br>

<hr>
<!-- <button onclick="buscarProducto()">Buscar</button>  -->
  <label for="ref_prod_venta">Referencia</label>
  <input type="text" size="5"id="ref_prod_venta" name="ref_prod_venta"  oninput="buscarProducto()">
  <label for="unidades_producto">Stock</label>
   <input type="text" size="5"id="unidades_producto" name="unidades_producto"readonly>
   <label for="diferencia_producto">Diferencia</label>
   <input type="text" size="5"id="diferencia_producto" name="diferencia_producto"readonly><br><br>  
   
        
        
       
        <label for="unidades_venta">Unidades:</label>
        <input type="text" size="5" id="unidades_venta" name="unidades_venta" oninput="calcularDiferencia(); calcularValorTotalVenta()">  

        <label for="ref_prod_venta_2">Referencia</label>
        <input type="text" size="5" id="ref_prod_venta_2" readonly name="ref_prod_venta_2">

        <label for="producto_venta">Producto:</label>
        <input type="text" id="producto_venta" name="producto_venta" readonly>

        <label for="producto_venta">Categoria:</label>
        <input type="text" id="cat_producto" name="cat_producto" readonly><br>

        <label for="valor_producto">Valor Unidad:</label>
        <input type="number" step="0.01" id="valor_producto" name="valor_producto" readonly oninput="calcularValorTotalVenta()">
              
        <label for="valor_total_venta">Sub Total:</label>
        <input size="5"type="number" step="0.01" id="valor_total_venta" name="valor_total_venta" readonly><br><br>
        </span><a href="validar_factura_3.php" class="btn btn-primary">Ver Carrito</a>
        
        <button type="submit" name="submit" class="btn btn-success" onclick="return validarCampos();">Agregar al Carrito</button>
        </form> 
        <br>
        <hr>
    
    
    <?php
}
    
?>  
    </div>

    </body>
    </html>

    <script>
  
  function validarCampos() {
var factura_venta = document.getElementById("factura_venta").value;
var nom_cliente = document.getElementById("nom_cliente").value;
var valor_total_venta = document.getElementById("valor_total_venta").value;
var caja = document.getElementById("caja").value;
var fecha_hora_venta = document.getElementById("fecha_hora_venta").value;
var asesor_venta = document.getElementById("asesor_venta").value;
var forma_de_pago = document.getElementById("forma_de_pago").value;
var forma_de_pago = document.getElementById("unidades_venta").value;
var producto_venta = document.getElementById("producto_venta").value;
var valor_producto = document.getElementById("valor_producto").value;
var valor_producto = document.getElementById("ref_prod_venta_2").value;


   
if (fecha_hora_venta === "" || factura_venta === "" || nom_cliente === "" ||  valor_total_venta === "" || caja === "" || asesor_venta === "" || forma_de_pago === "" || unidades_venta === "" || producto_venta === "" || valor_producto === "" || ref_prod_venta_2 === "") {
    alert("Debe llenar todos los campos.");
    return false; // Evita que el formulario se envíe si hay campos vacíos
}
return preguntarRegistrarVenta();

}
</script>


<script>
function nueva_venta() {
    
    $.ajax({
        url: 'id_factura.php',
        method: 'GET',
        success: function(response) {
            var ultimoId = parseInt(response);
            var nuevoId = (ultimoId + 1);
            // Hacer algo con el nuevoId, como mostrarlo en un campo de formulario
            document.getElementById("factura_venta").value = nuevoId;
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);    
        }
    });
}
</script>
<script>
function confirmarCancelarVenta() {
    if (window.confirm("¿Está seguro que desea cancelar la venta y borrar todos los datos?")) {
        location.reload();
    }
}
</script>
<script>
function preguntarRegistrarVenta() {
    var confirmacion = confirm("¿Desea registrar la venta?");
    
    if (confirmacion) {
        // Si el usuario elige "Aceptar", el formulario se enviará normalmente
        return true;
    } else {
        // Si el usuario elige "Cancelar", el formulario no se enviará
        return false;
    }
}
</script>

<script>
function buscarCliente() {
    event.preventDefault();
    var doc_cliente_venta = $('#doc_cliente_venta').val();

    // Realizar la solicitud AJAX
    $.ajax({
        type: 'POST',
        url: 'buscar_cliente.php',
        data: { doc_cliente_venta: doc_cliente_venta },
        dataType: 'json',
        success: function(response) {
            // Mostrar el nombre del cliente en el campo de texto
            $('#nom_cliente').val(response.nom_cliente);
            $('#doc_cliente_venta_2').val(response.doc_cliente); 
          
        },
        error: function() {
            alert('Error al buscar el cliente.');
        }
    });
}
</script>

<script>
function buscarProducto() {
    event.preventDefault();
    var ref_prod_venta = $('#ref_prod_venta').val();

    // Realizar la solicitud AJAX
    $.ajax({
        type: 'POST',
        url: 'buscar_referencia.php',
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
</script>

<script>
    function agregarAlCarrito() {

//calcular valor total
        


        // Obtener los valores de los campos de entrada
        var unidadesVentaInput = document.getElementById("unidades_venta");
        var refProdInput = document.getElementById("ref_prod_venta_2");
        var productoInput = document.getElementById("producto_venta");
        var valorProductoInput = document.getElementById("valor_producto");
        var unidadesProductoInput = document.getElementById("unidades_producto");
        var catProductoInput = document.getElementById("cat_producto");
        
        // Verificar si alguno de los campos está vacío
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
        
        // Obtener los valores actuales de los campos
        var unidadesVenta = parseInt(unidadesVentaInput.value);
        var refProd = refProdInput.value;
        var producto = productoInput.value;
        var valorProducto = parseFloat(valorProductoInput.value);
        var unidadesProducto = parseInt(unidadesProductoInput.value);
        var catProducto = catProductoInput.value;
        
        // Validar que las unidades de venta sean válidas
        if (isNaN(unidadesVenta) || unidadesVenta <= 0) {
            alert("Por favor, ingresa un número válido de unidades.");
            return;
        }
        
        // Calcular la diferencia (nuevo stock)
        var nuevoStock = unidadesProducto - unidadesVenta;
        
        // Mostrar la diferencia en el campo de stock si pasa la validación
        if (nuevoStock >= 0) {
            unidadesProductoInput.value = nuevoStock;
        } else {
            alert("No hay stock disponible.");
            return;
        }
        
        // Agregar los valores a la tabla
        var tabla = document.getElementById("tablaItems");
        var fila = tabla.insertRow();
        
        // Insertar las celdas en el nuevo orden
        var celdaRefProd = fila.insertCell(0);
        var celdaCatProducto = fila.insertCell(1);
        var celdaProducto = fila.insertCell(2);
        var celdaUnidadesVenta = fila.insertCell(3);
        var celdaValorTotal = fila.insertCell(4);
        var celdaEliminar = fila.insertCell(5); // Nueva celda para el botón de eliminar
        
        // Agregar los valores a las celdas
        celdaRefProd.innerHTML = refProd;
        celdaCatProducto.innerHTML = catProducto;
        celdaProducto.innerHTML = producto;
        celdaUnidadesVenta.innerHTML = unidadesVenta;
        celdaValorTotal.innerHTML = (unidadesVenta * valorProducto).toFixed(2);
        
        // Botón de eliminar
        var botonEliminar = document.createElement("button");
        botonEliminar.innerText = "Eliminar";
        botonEliminar.onclick = function() {
            // Eliminar la fila al hacer clic en el botón
            tabla.deleteRow(fila.rowIndex);
            // Recalcular los totales
            calcularTotales();
        };
        celdaEliminar.appendChild(botonEliminar);
        
        // Calcular el valor total de la venta y el valor del IVA
        calcularTotales();
        
        // Limpiar los campos después de agregar el item
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
        
        // Calcular el total de la venta
        for (var i = 1; i < filas; i++) { // Comenzamos desde 1 para omitir la fila de encabezados
            var valorTotalCelda = tabla.rows[i].cells[4].innerHTML; // La celda 4 contiene el valor total de la venta
            totalVenta += parseFloat(valorTotalCelda);
        }
        
        // Calcular el valor del IVA
        var valorIVA = totalVenta * 0.19;
        
        // Mostrar los totales
        document.getElementById("valor_iva").innerText = valorIVA.toFixed(2); // Mostrar el valor del IVA con dos decimales
        document.getElementById("valor_total_venta").innerText = (totalVenta + valorIVA).toFixed(2); // Mostrar el valor total de la venta con dos decimales
    }
</script>

<script>
    function calcularValorTotalVenta() {
        // Obtener los valores de los campos de entrada
        var unidadesVentaInput = document.getElementById("unidades_venta");
        var valorProductoInput = document.getElementById("valor_producto");
        var valorTotalVentaInput = document.getElementById("valor_total_venta");
        
        // Obtener los valores actuales de los campos
        var unidadesVenta = parseInt(unidadesVentaInput.value);
        var valorProducto = parseFloat(valorProductoInput.value);
        
        // Calcular el valor total de la venta
        var valorTotalVenta = unidadesVenta * valorProducto;
        
        // Mostrar el valor total de la venta en el campo correspondiente
        valorTotalVentaInput.value = valorTotalVenta.toFixed(2); // Mostrar el resultado con dos decimales
    }
</script>

<script>
function limpiarFormulario() {
    
       document.getElementById("doc_cliente_venta").value = "";
    document.getElementById("doc_cliente_venta_2").value = "";
    document.getElementById("nom_cliente").value = "";
    document.getElementById("caja").value = "";
    document.getElementById("forma_de_pago").value = "";
    document.getElementById("unidades_venta").value = "";
    document.getElementById("ref_prod_venta_2").value = "";
    document.getElementById("producto_venta").value = "";
    document.getElementById("cat_producto").value = "";
    document.getElementById("valor_producto").value = "";
    document.getElementById("valor_total_venta").value = "";
}
</script>
<script>
    function calcularDiferencia() {
        // Obtener los valores de los campos
        var unidadesProducto = parseInt(document.getElementById('unidades_producto').value);
        var unidadesVenta = parseInt(document.getElementById('unidades_venta').value);

        // Calcular la diferencia
        var diferencia = unidadesProducto - unidadesVenta;

        // Mostrar la diferencia en el campo correspondiente
        document.getElementById('diferencia_producto').value = isNaN(diferencia) ? '' : diferencia;
    }
</script>
<script>
function validarFormulario() {
    // Obtener el valor del campo diferencia_producto
    var diferencia = parseFloat(document.getElementById('diferencia_producto').value);

    // Verificar si la diferencia es menor que cero
    if (diferencia < 0) {
        // Mostrar mensaje de error
        alert('No hay stock disponible.');

        // Evitar el envío del formulario
        return false;
    }

    // Permitir el envío del formulario si la diferencia es mayor o igual a cero
    return true;
}
</script>

<script>
/// Función para actualizar el campo de fecha y hora con 5 horas menos y sin segundos
function actualizarFechaHora() {
    // Obtener la fecha y hora actual
    var fechaHoraActual = new Date();

    // Restar 5 horas a la fecha y hora actual
    fechaHoraActual.setHours(fechaHoraActual.getHours() -5);

    // Formatear la fecha y hora actual como una cadena adecuada para el input datetime (sin segundos)
    var fechaHoraFormateada = fechaHoraActual.toISOString().slice(0, 16).replace('T', ' ');

    // Establecer el valor del campo de fecha y hora
    document.getElementById('fecha_hora_venta').value = fechaHoraFormateada;
}

// Actualizar la fecha y hora cada segundo
setInterval(actualizarFechaHora, 1000);

</script>
