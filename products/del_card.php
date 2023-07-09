<?php 
require_once 'config.php';

$id = $_GET['id'];
echo $id ;
$delete="DELETE FROM `addcard` WHERE `id`= '$id' ";

  mysqli_query($con,$delete);

  header('location: card.php');

?>