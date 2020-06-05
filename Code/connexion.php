<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>LPA</title>

  <!--Boostrap-->
  <link
  rel="stylesheet"
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
  crossorigin="anonymous"
  />
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
  <!-- CSS -->
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  
</head>

<body>
  <div class="navbar">
  </div>
  <div class="image-authen">
    <img class="fit-picture"
    src="image/equipe.jpg"
    alt="Votre conseil municipal"
    height="150"
    width="250">
  </div>
  <div class="formulaire">

    <?php
    require('config.php');
    session_start();
    if (isset($_POST['username'])){
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($conn, $username);
      $password = strip_tags($_REQUEST['password']);
      $password = mysqli_real_escape_string($conn, $password);
      /*Hhh8936?kzqs*/
      $query = "SELECT * FROM `user` WHERE username='$username'" ;
      
      $result = mysqli_query($conn,$query) or die(mysql_error());
      $rep = mysqli_fetch_assoc($result);
      
      if(password_verify($password, $rep['password'])){
        $message = "C good";
        $_SESSION['username'] = $username;
        header("Location: accueil.php");
      }else{
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
      }
    } 
    ?>
    <form class="box" action="" method="post" name="login">

      <h1 class="box-title">Connexion</h1>
      <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required><br>
      <input type="password" class="box-input" name="password" placeholder="Mot de passe" required><br>
      <input type="submit" value="Connexion " name="submit" class="box-button">
      <?php if (! empty($message)) { ?>
        <p class="errorMessage"><?php echo $message; ?></p>
      <?php } ?>
    </form>


  </div>
</body>

</html>