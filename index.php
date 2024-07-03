<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cotización</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="./css/estilos.css">
    <script src="./js/app.js" defer></script> -->
</head>
<body>

    <!-- <div class="menu-dashboard">
        
        <div class="top-menu">
            <div class="logo">
                <img src="./img/logo.svg" alt="">
                <span>TuMejorWeb</span>
            </div>
            <div class="toggle">
                <i class='bx bx-menu'></i>
            </div>
        </div>
       
        <div class="input-search">
            <i class='bx bx-search'></i>
            <input type="text" class="input" placeholder="Buscar">
        </div>
        
        <div class="menu">
            <div class="enlace">
                <i class="bx bx-grid-alt"></i>
                <span>Dashboard</span>
            </div>

            <div class="enlace">
                <i class="bx bx-user"></i>
                <a href="./formCotizacioens.php"><span>Cotizacion talonarios</span></a>
            </div>

            <div class="enlace">
                <i class="bx bx-grid-alt"></i>
                <span>Analíticas</span>
            </div>

            <div class="enlace">
                <i class="bx bx-message-square"></i>
                <span>Mensajes</span>
            </div>

            <div class="enlace">
                <i class="bx bx-file-blank"></i>
                <span>Archivos</span>
            </div>

            <div class="enlace">
                <i class="bx bx-cart"></i>
                <span>Pedidos</span>
            </div>

            <div class="enlace">
                <i class="bx bx-heart"></i>
                <span>Favoritos</span>
            </div>

            <div class="enlace">
                <i class="bx bx-cog"></i>
                <span>Configuración</span>
            </div>
        </div>
    </div> -->

<!-- 
    <style>
        #resultado{
            display: block;
        }
    </style>

    <?php include('./calculo_cotizacion.php')?>
    
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

   

</body> -->
<footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</footer>
</html>