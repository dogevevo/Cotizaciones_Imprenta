<link rel="stylesheet" href="../css/estilos.css">
<?php include('../index.php')?>


<div class="container">
  <h2 class="my-5" >Cotizacion Bussines card</h2>
  <div class="row">
    <div class="md-col-12">
      

      <!-- Formlario -->

      <form method="POST" action="" id="FormCardCotizacion"  enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleInputEmail1">Cantidad de bussines card</label>
          <input type="text" class="form-control" id="CantidadCard" name="CantidadCard" aria-describedby="emailHelp" placeholder="Cantdad Business Card">
          <small id="emailHelp" class="form-text text-muted"> -- </small>
        </div>
        <label for="dobleSideCard">Business card doble cara?</label>
        <input type="checkbox" name="dobleSideCard" id="dobleSideCard">
       
        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </div>
</div>


<div class="container my-5" id="resultado">
    <div class="ro">
        <div class="col-md-8">
            <h1>Cotizacion de Business Card</h1>
            <h5>Cantidad de Business card: <span id="cantidadCard"></span></h5>
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
                        <td>Precio Tabloide</td>
                        <td id="totalPriceTabloide"></td>
                    </tr>
                    <!-- <tr>
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
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- script -->
<script>

document.querySelector('#FormCardCotizacion').addEventListener('submit', function(event) {
  event.preventDefault();
  const cantidadCard = document.querySelector('#cantidadCard').value; 
  const dobleSideCard = document.querySelector('#dobleSideCard').checked ? 1 : 0; 

  const formData = new FormData();
  formData.append('cantidadCard', cantidadCard);
  formData.append('dobleSideCard', dobleSideCard); 

  fetch('../calculo_cardCotizacion.php', {
    method: 'POST',
    body: formData, 
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response error');
    }
    return response.json(); 
  })
  .then(data => {
    document.querySelector('#totalPriceTabloide').textContent = data.totalPriceTalonarios; 
    document.querySelector('#CantidadCard').textContent = data.CantidadCard;
    document.querySelector('#tipoTabloide').textContent = data.tipoTalonario;
    document.querySelector('#resultado').style.display = 'block'; 
  })
  .catch(error => {
    console.error('Error:', error);
  });
});
</script>



<link rel="stylesheet" href="../js/app.js">




