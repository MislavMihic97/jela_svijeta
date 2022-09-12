<!DOCTYPE html>
<html lang="hr">
  <head>
    <meta charset="UTF-8">
    <title>Podaci jela svijeta</title>
  </head>
  <body>
    <div style="text-align: center;">
            <h1>Jela svijeta</h1>
            <table border="1" cellpadding="2" cellspacing="2" style="width:60%; margin-left: auto; margin-right: auto;">
                <tr>
                    <th>ID</th>
                    <th>Naziv jela</th>
                    <th>Opis</th>
                    <th>Status</th>
                    <th>KategorijaID</th>
                    <th>TagID</th>
                    <th>SastojakID</th>
                </tr>
    <?php
      $db = mysqli_connect('localhost', 'root', '') or die ('Unable to establish connection.');
      mysqli_select_db($db, 'meals_of_the_world') or die (mysqli_error($db));

      $category = $_POST['category'];
      $tag = $_POST['tag'];
      $ingredient = $_POST['ingredient'];

      $query = "SELECT * FROM meals WHERE categoryID = category.id OR tagID = tags.id OR ingredientID = ingredients.id";

      mysqli_query($db, $query) or die (mysqli_error($db));
      $result = $db->query($query);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<td>' . $row["id"] . '</td>';
          echo '<td>' . $row["title"] . '</td>';
          echo '<td>' . $row["description"] . '</td>';
          echo '<td>' . $row["status"] . '</td>';
          echo '<td>' . $row["categoryID"] . '</td>';
          echo '<td>' . $row["tagID"] . '</td>';
          echo '<td>' . $row["ingredientID"] . '</td>';
          echo '<tr>';
        }
      } else {
          echo "No result!";
      }
      $db->close();
    ?>
      </table>
      <a href="jela_svijeta.html"> <input type="submit" value="Nazad"/></a>
    </div>
  </body>
</html>
