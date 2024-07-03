<?php include('./index.php')?>
<style>
    #resultado{
        display: block;
    }
</style>

<?php // include('./calculo_cotizacion.php')?>

<div class="display-flex my-5">
    

    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <h2>Cotizacion Talonarios</h2>

                <form action="" id="cotizacionForm" method="post" class="form-control" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="cantidadTalonarios" class="form-label">Cantidad Talonarios:</label>
                        <input type="text" name="cantidadTalonarios" id="cantidadTalonarios" placeholder="Cantidad de talonarios" class="form-control">
                        <br>
                    </div>
                    <label for="variable_ganancia">Selecciona la variable de ganancia:</label>
                    <select name="variable_ganancia" id="variable_ganancia" class="form-control">
                        <option value="1.2">1.2</option>
                        <option value="1.3">1.3</option>
                        <option value="1.4">1.4</option>
                        <option value="1.5">1.5</option>
                        <option value="1.6">1.6</option>
                        <option value="1.7">1.7</option>
                        <option value="1.8">1.8</option>
                        <option value="1.9">1.9</option>
                        <option value="2.0">2.0</option>
                    </select>
                    <br><br>
                    <label for="iva_proveedor">¿Incluir IVA del proveedor?</label>
                    <input type="checkbox" name="iva_proveedor" id="iva_proveedor">
                    <br><br>
                    <input type="submit" value="Calcular" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container my-5" id="resultado">
    <div class="ro">
        <div class="col-md-8">
            <h1>Cotizacion Talonarios</h1>
            <h5>Cantidad de talonarios: <span id="cantidadTalonariosSpan"></span></h5>
            <table class="table ">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Datos</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Precio Cantidad</td>
                        <td id="precioCantidad"></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Precio Costo</td>
                        <td id="precioCostoResult"></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Ganancia</td>
                        <td id="gananciaResult"></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Precio Público</td>
                        <td id="precioPublicoResult"></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Precio Venta</td>
                        <td id="precioVenta"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('cotizacionForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const cantidadTalonarios = document.getElementById('cantidadTalonarios').value;
        const variableGanancia = document.getElementById('variable_ganancia').value;
        const ivaProveedor = document.getElementById('iva_proveedor').checked ? 1 : 0;
        
        const formData = new FormData();
        formData.append('cantidadTalonarios', cantidadTalonarios);
        formData.append('variable_ganancia', variableGanancia);
        formData.append('iva_proveedor', ivaProveedor);
        
        fetch('calculo_cotizacion.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('cantidadTalonariosSpan').textContent = data.cantidadTalonarios;
            document.getElementById('precioCantidad').textContent = data.precioCantidad;
            document.getElementById('precioCostoResult').textContent = data.precioCosto;
            document.getElementById('gananciaResult').textContent = data.ganancia;
            document.getElementById('precioPublicoResult').textContent = data.precioPublico;
            document.getElementById('precioVenta').textContent = data.precioVenta;
            
            document.getElementById('resultado').style.display = 'block';
        });
    });
</script>


