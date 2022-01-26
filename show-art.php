<?php 
  include 'config.php';

  $id = null; 
  if ( !empty($_GET['id'])) { 
    $id = $_REQUEST['id']; 
  }
  if ( null==$id ) { 
    header("Location: index.php"); 
  }


  $sqlSelectArt = "SELECT * FROM `articles` WHERE `id` = $id";
  $q = mysqli_query($conn, $sqlSelectArt);
  $data = mysqli_fetch_assoc($q);

  // $sqlDeleteArt = "DELETE FROM `articles` WHERE `id` = $id";
  // $deleteOne = mysqli_query($conn, $sqlDeleteArt);
  // $delete = mysqli_fetch_assoc($deleteOne);

  
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
    <h1 class="article-title"><?php echo $data["title"] ?></h1>
    <img class="image" src="<?php echo $data["image"] ?>" alt="">
    <p class="content"><?php echo $data["content"] ?></p>
    <div class="infos">
      <p class="author"><?php echo $data["author"] ?></p>
      <p><?php echo $data["date"] ?></p>
    </div>

    
    <div class="buttons" style="width:100%;display:flex;justify-content:space-between;">
        <a href="index.php">Retour à la page d'accueil</a>
        <div class="flex">
          <a href="<?php echo "update-art.php?id=".$data["id"] ?>" class="btn-blue"><button class="btn-content">Modifer</button></a>
          <a href="<?php echo "index.php?id=".$data["id"] ?>"  class="btn-red" ><button class="btn-content">Supprimer</button></a>
        </div>
    </div>
</div>
</body>
</html>