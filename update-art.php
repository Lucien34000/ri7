<?php
include 'config.php';

$title = mysqli_real_escape_string($conn, $_REQUEST['title']);
$image = $_REQUEST['image'];
$content = mysqli_real_escape_string($conn, $_REQUEST['content']);
$author = mysqli_real_escape_string($conn, $_REQUEST['author']);

$id = null; 
if ( !empty($_GET['id'])) { 
  $id = $_REQUEST['id']; 
}
// if ( null==$id ) { 
//   header("Location: index.php"); 
// }

if (count($_POST) > 0) {
  $sqlUpdateArt = mysqli_query($conn, "UPDATE articles SET title = '$title', image = '$image', content = '$content', author = '$author' WHERE id = $id");
  $updateOne = mysqli_query($conn, $sqlUpdateArt);
  $update = mysqli_fetch_assoc($updateOne);

} else {
  $sqlSelectArt = "SELECT * FROM `articles` WHERE `id` = $id";
  $q = mysqli_query($conn, $sqlSelectArt);
  $data = mysqli_fetch_assoc($q);
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
      <h1>Vous modifiez l'article : <?php echo $data["title"] ?></h1>
    </div>

      <article>
        <h2 class="article-title">Veuillez remplir les champs suivants pour modifier votre article.</h2>
        <form action="update-art.php?id=<?php echo $data["id"] ?>" method="post">
          <div class="align-input">
            <label for="title" class="label-style">Titre :</label>
            <input type="text" name="title" id="title" style="width:300px;" value="<?php echo $data["title"] ?>">
          </div>
          <div class="align-input">
            <label for="image" class="label-style">Modifier une image :</label>
            <input type="text" name="image" id="image" style="width:300px;height:30px;margin-right:20px;" value="<?php echo $data["image"] ?>">
            <img class="image-update" src="<?php echo $data["image"] ?>" alt="">
          </div>
          <div class="align-input">
            <label for="content" class="label-style">Contenu :</label>
            <textarea name="content" id="content" cols="60" rows="10"><?php echo $data["content"] ?></textarea>
          </div>
          <div class="align-input">
            <label for="author" class="label-style">Auteur :</label>
            <input type="text" name="author" id="author" style="width:300px;"  value="<?php echo $data["author"] ?>">
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