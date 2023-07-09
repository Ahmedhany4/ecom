<?php 
require_once 'config.php';
$id = $_GET['id'];
$delete="DELETE FROM `products` WHERE `id`= '$id' ";
  mysqli_query($con,$delete);
  header('location: products.php');