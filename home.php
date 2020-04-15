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
  <?php if ($_SESSION['name'] == 'admin'){
    header("Location: admin.php");

  }?>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">My Orders</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
       
    </ul>

  </div>

  <div class="collapse navbar-collapse" id="navbarNav">  
 
    <span class="navbar-text">
       Welcome Mr. <?php echo $_SESSION['name'];?>
    </span>
 
</div>

</nav>


<form method = "post" action="insert_order.php">
    
      <button type = "submit" class="btn btn-light btn-xs"  data-toggle="modal" data-target="#delete-modal">

      <svg class="bi bi-file-earmark-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M9 1H4a2 2 0 00-2 2v10a2 2 0 002 2h5v-1H4a1 1 0 01-1-1V3a1 1 0 011-1h5v2.5A1.5 1.5 0 0010.5 6H13v2h1V6L9 1z"/>
        <path fill-rule="evenodd" d="M13.5 10a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13v-1.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M13 12.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>
      </svg>

      Insert order


      </button> 
</form>



<?php
$conexao = mysqli_connect("localhost","root","","PurchasesDB") or print (mysqli_error());
// test if admin or normal customer to redirect a suitable page.


if (!empty($_POST["dataForRemoving"])){

  $removingRow = $_POST["dataForRemoving"];
  $query_for_removing = "DELETE FROM orders WHERE id=$removingRow";
  mysqli_query($conexao,$query_for_removing);

}

 
$id = $_SESSION['id'];



$query = "SELECT id,description,amount, customer_id FROM orders WHERE customer_id =$id";

$resultado = mysqli_query($conexao,$query);

?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Amount</th>
      <th scope="col"><th>
      <th scope="col"><th>
    

    </tr>
  </thead>
  <tbody>

<?php

while($linha = mysqli_fetch_array($resultado)){
    echo "<tr> <td>".$linha['id']."</td>
    <td>".$linha['description']."</td>
    <td>".$linha['amount']."</td>";
    ?>

    <td>
    <form method = "post" action="update_order.php">
    <input type = "hidden" id="inputHidden" name="dataForUpdating" value=<?php echo $linha['id']; ?> >  
      <button type = "submit" class="btn btn-info btn-xs"  >Editar</button> 
    </td>
    </form>  


    <td>
    <form method = "post" action="home.php">
    <input type = "hidden" id="inputHidden" name="dataForRemoving" value=<?php echo $linha['id']; ?> >  
      <button type = "submit" class="btn btn-danger btn-xs"  >Excluir</button> 
    </td></tr>
    </form>



  
    <?php
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