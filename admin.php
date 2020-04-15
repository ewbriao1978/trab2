<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Main page - Home</title>
  </head>
  <body>

  
  <?php session_start(); ?> 
  



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">My Orders</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
       
    </ul>

  </div>

  <div class="collapse navbar-collapse" id="navbarNav">  
 
    <span class="navbar-text">
       ADMINISTRATION
    </span>
 
</div>

</nav>



<?php
$conexao = mysqli_connect("localhost","root","","PurchasesDB") or print (mysqli_error());
 
 
$id = $_SESSION['id'];

$query = "SELECT *  FROM customers ORDER BY name";

$resultado = mysqli_query($conexao,$query);

?>


<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
     

    </tr>
  </thead>
  <tbody>

<?php
while($linha = mysqli_fetch_array($resultado)){
    if ($linha['name'] == 'admin') continue;
    
    $customerID=$linha['id'];
    $sql="SELECT * FROM orders WHERE customer_id = $customerID";
    $resultOrder = mysqli_query($conexao,$sql);


    echo "<tr class=\"table-primary\"> <td>".$linha['id']."</td>
    <td>".$linha['name']."</td>
    <td>".$linha['email']."</td></tr>";
    if ($resultOrder->num_rows>0){
  
?>
<tr><td>
      <table class="table table-light">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Description</th>
            <th scope="col">Amount</th>

          </tr>
        </thead>
        <tbody>

<?php
    
    while($orderLine = mysqli_fetch_array($resultOrder)){
      echo "<tr> <td>".$orderLine['id']."</td>
      <td>".$orderLine['description']."</td>
      <td>".$orderLine['amount']."</td></tr>";

    }

?>    </td></tr>
       </tbody>
      </table>
<?php

  }//if
}

?>


    
</tbody>
</table>



<?php
mysqli_close($conexao);
?>











    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>