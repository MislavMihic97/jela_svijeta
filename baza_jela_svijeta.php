<!DOCTYPE html>
<html lang="hr">
  <head>
    <meta charset="UTF-8">
    <title>Baza podataka jela svijeta</title>
  </head>
  <body>
    <?php
      $host = 'localhost';
      $user = 'root';
      $password = '';
      $db = mysqli_connect($host,$user,$password) or die ('Unable to establish connection.');
      $query = 'CREATE DATABASE IF NOT EXISTS meals_of_the_world CHARACTER SET=utf8 COLLATE utf8_croatian_ci';
      mysqli_query($db, $query) or die (mysqli_error($db));
      mysqli_select_db($db, 'meals_of_the_world') or die (mysqli_error($db));

      $query2 = 'CREATE TABLE meals (
      mealsID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
      title VARCHAR(60) NOT NULL,
      description VARCHAR(60) NOT NULL,
      status VARCHAR(60) DEFAULT 'created',
      categoryID INTEGER,
      tagsID INTEGER,
      ingredientsID INTEGER,
      PRIMARY KEY (id),
      FOREIGN KEY (categoryID),
      FOREIGN KEY (tagsID),
      FOREIGN KEY (ingredientsID)
      )
      ENGINE = MyISAM';
      mysqli_query($db, $query2) or die (mysqli_error($db));

      $query3 = 'CREATE TABLE category (
      categoryID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
      title VARCHAR(60) NOT NULL,
      slug VARCHAR(60) NOT NULL,
      PRIMARY KEY (id),
      UNIQUE (slug)
      )
      ENGINE = MyISAM';
      mysqli_query($db, $query3) or die (mysqli_error($db));

      $query4 = 'CREATE TABLE tags (
      tagsID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
      title VARCHAR(60) NOT NULL,
      slug VARCHAR(60) NOT NULL,
      PRIMARY KEY (id),
      UNIQUE (slug)
      )
      ENGINE = MyISAM';
      mysqli_query($db, $query4) or die (mysqli_error($db));

      $query5 = 'CREATE TABLE ingredients (
      ingredientsID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
      title VARCHAR(60) NOT NULL,
      slug VARCHAR(60) NOT NULL,
      PRIMARY KEY (id),
      UNIQUE (slug)
      )
      ENGINE = MyISAM';
      mysqli_query($db, $query5) or die (mysqli_error($db));

      $query6 = 'CREATE TABLE languages (
      id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
      title VARCHAR(60) NOT NULL,
      lang VARCHAR(60) NOT NULL,
      PRIMARY KEY (id)
      )
      ENGINE = MyISAM';
      mysqli_query($db, $query6) or die (mysqli_error($db));

      echo "Success!";
      $db->close();
     ?>
  </body>
</html>
