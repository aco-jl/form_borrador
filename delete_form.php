<?php

include("conn.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM peliculas WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Pelicula eliminada Satisfactoriamente';
  $_SESSION['message_color'] = 'danger';
  header('Location: index.php');
} 

?>