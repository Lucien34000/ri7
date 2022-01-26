<?php
include 'config.php';

$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
$image = $_REQUEST['image'];
$cat_id = $_REQUEST['cat_id'];
$content = mysqli_real_escape_string($conn, $_REQUEST['content']);
$author = mysqli_real_escape_string($conn, $_REQUEST['author']);

if (count($_POST) > 0) {
  $newArt = "INSERT INTO articles (title, image, content, author, cat_id) VALUES ('$title', '$image', '$content', '$author', '$cat_id')";
  var_dump($newArt);
  $q = mysqli_query($conn, $newArt);
  var_dump($q);
  $data = mysqli_fetch_assoc($q);
  var_dump($data);
}

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  </head>
<body>

  <div class="container">
    <div class="header">
      <h1>Nouvel article</h1>
    </div>

      <article>
        <h2 class="article-title">Veuillez remplir les champs suivants pour poster un nouvel article.</h2>
        <form action="create-art.php" method="post">
          <div class="align-input">
            <label for="title" class="label-style">Titre :</label>
            <input type="text" name="title" id="title" style="width:300px;">
          </div>
          <div class="align-input">
            <label for="image" class="label-style">Ajouter une image :</label>
            <input type="text" name="image" id="image" style="width:300px;">
          </div>
          <div class="align-input">
            <label for="cat_id" class="label-style" style="width: 200px; margin-right:20px;">Sélectionnez une catégorie :</label>
            <select name="cat_id" id="cat_id">
              <option value="">--Please choose an option--</option>
              <option value="1">Catégorie 1</option>
              <option value="2">Catégorie 2</option>
              <option value="3">Catégorie 3</option>
          </select>
          </div>
          <div class="align-input">
            <label for="content" class="label-style">Contenu :</label>
            <textarea name="content" id="content" cols="60" rows="10"></textarea>
          </div>
          <div class="align-input">
            <label for="author" class="label-style">Auteur :</label>
            <input type="text" name="author" id="author" style="width:300px;">
          </div>

          <button type="submit" class="btn-green">Envoyer</button>
        </form>    
        <a href="index.php" ><button class="btn-return" style="margin-top:10px;">Retour</button></a>
          
    </article>

    <?php 
  ?>
  </div>
</body>
</html>