<?php
include("conn.php");
$title = '';
$type = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM peliculas WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $type = $row['type'];
    $description = $row['description'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $type= $_POST['type'];
  $description = $_POST['description'];

  $query = "UPDATE peliculas set title = '$title', type = '$type', description = '$description' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Pelicula actualizada satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}
?>

<?php include("include/header.php") ?>
  <form action="edit_form.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div >
      <input name="title" type="text" value="<?php echo $title; ?>" placeholder="Actualiza el titulo">
    </div>
    <div >
      <input name="type" type="text" value="<?php echo $type; ?>" placeholder="Actualiza el genero">
    </div>
    <div >
    <textarea name="description" cols="30" rows="10" placeholder="Actualiza la reseña" ><?php echo $description;?></textarea>
    </div>
    <button name="update">
      Actualizar
    </button>
  </form>
<?php include("include/foother.php") ?>
