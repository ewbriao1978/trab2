<?php
$name = $_POST['name'];
$email = $_POST['email'];
$passwd  = md5($_POST['passwd']);
 
$conexao = mysqli_connect("localhost","root","","PurchasesDB") or print (mysqli_error());

$query = "INSERT INTO customers (name,email,passwd) VALUES ('$name','$email', '$passwd')";

if (mysqli_query($conexao, $query)) {  
    header("Location: login.php?msg=OK");
} else {
    header("Location: login.php?msg=ERRO");
}

?>
