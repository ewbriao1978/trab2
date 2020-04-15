<?php
session_start();

$email = $_POST['email'];
$passwd  = md5($_POST['password']);

$conexao = mysqli_connect("localhost","root","","PurchasesDB") or print (mysqli_error());

$query = "SELECT * FROM customers WHERE email='$email' and passwd= '$passwd'";

if ($result=mysqli_query($conexao, $query)) {

  $linha = mysqli_fetch_array($result);
  if(!empty($linha)){
    $_SESSION['name'] = $linha['name'];
    $_SESSION['email'] = $linha['email'];
    $_SESSION['id'] = $linha['id'];
    header("Location: home.php");
  }else{
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    header("Location: login.php?msg=LOGIN_ERROR");
  }
    //header("Location: login.php?msg=OK");
} else {
    header("Location: login.php?msg=ERRO");
}
?>