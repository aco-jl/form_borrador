<?php include("conn.php") ?>
<?php include("include/header.php") ?>

    <form action="save_form.php" method="POST">
      <div>
        <input
          type="text"
          name="title"
          placeholder="Titulo de la pelicula*"
          required
          autofocus
        />
      </div>
      <div>
        <input type="text" name="type" placeholder="Genero" />
      </div>
      <div>
        <textarea
          name="description"
          id=""
          cols="50"
          rows="5"
          placeholder="Escribe tu reseña, almenos 3 palabras*"
          required
        ></textarea>
      </div>
      <!--<div>
        <label>
          Acepto los terminos y condiciones
          <input type="checkbox" required />
        </label>
      </div>-->
      <input type="submit" name="send" value="Guardar" />
    </form>

    <table>
      <thead>
        <tr>
          <th>Titulo</th>
          <th>Genero</th>
          <th>Reseña</th>
          <th>Creado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $query = "SELECT * FROM peliculas";
          $result_movies = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_array($result_movies)){ ?>
        <tr>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['type']; ?></td>
          <td><?php echo $row['description']; ?></td>
          <td><?php echo $row['created_at']; ?></td>
          <td>
            <a
              href="edit_form.php?id=<?php echo $row['id']?>"
            >
              <i class="fas fa-marker"></i>
            </a>
            <a
              href="delete_form.php?id=<?php echo $row['id']?>"
            >
              <i class="far fa-trash-alt"></i>
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php include("include/foother.php") ?>
