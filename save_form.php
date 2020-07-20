<?php

include('conn.php');

if (isset($_POST['send'])) {
  $title = $_POST['title'];
  $type = $_POST['type'];
  $description = $_POST['description'];

  $query = "INSERT INTO peliculas(title, type, description) VALUES ('$title', '$type', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed");
  }

  $_SESSION['message'] = 'Pelicula guardada satisfactoriamente';
  $_SESSION['message_color'] = 'success';
  header('Location: index.php');
  //echo 'saved';
}

?>