<?php
include 'config.php';

$sqlAllArticles = "SELECT * FROM `articles`";
$result = mysqli_query($conn, $sqlAllArticles);
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

$id = null; 
if ( !empty($_GET['id'])) { 
  $id = $_REQUEST['id']; 
}

$sqlDeleteArt = "DELETE FROM `articles` WHERE `id` = $id";
$deleteOne = mysqli_query($conn, $sqlDeleteArt);
$data = mysqli_fetch_assoc($deleteOne);

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
    <h1>Articles</h1>
    <a href="create-art.php"><i class="fas fa-plus-square fa-2x green" ></i></a>
  </div>

  <?php 

  if (is_array($articles) && count($articles) > 0) {

    foreach($articles as $article) {
      if(strlen($article["content"]) > 300) {
        $articleContent = substr($article["content"], 0, -700)."... (à suivre)";
      } else {
        $articleContent = $article["content"];
      }
      $date = date_create($article["date"]);
      $newDate = date_format($date, 'd/m/Y H:i:s');

      ?>

    <article>
      <h1 class="article-title"><?php echo ucfirst($article["title"]) ?></h1>
      <img class="image" src="<?php echo $article["image"] ?>" alt="">
      <p class="content"><?php echo $articleContent ?></p>
      <div class="footer">
        <div class="infos">
          <p class="author"><?php echo $article["author"] ?></p>
          <p><?php echo $newDate ?></p>
        </div>
        <div class="buttons">
          <a href="<?php echo "show-art.php?id=".$article["id"] ?>" class="btn-blue"><button class="btn-content">Voir</button></a>
          <a href="<?php echo "index.php?id=".$article["id"] ?>"  class="btn-red" ><button class="btn-content">Supprimer</button></a>
        </div>
      </div>
    </article>

  <?php 
  }
}?>

</div>



</body>
</html>