<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    Squola - <?= $templateParams["titolo"]; ?>
  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
  <header>
    <a  class="squola"  href="index.php"><em id="icon1" class="fas fa-pencil-ruler" ></em> Squola</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
      <a <?php if(isActive("index.php")): ?>class="active"<?php endif;?> href="index.php" >Home</a>
      <a <?php if(isActive("login.php") || isEchoVenditoreLoggedIn() || isEchoUtenteLoggedIn()):?>class="active"<?php endif;?> href="login.php" >Login</a>
      <a <?php if(noOneIsLoggedIn()):?>class="active"<?php endif;?> href="logout.php" >Logout</a>
      <a <?php if(noOneIsLoggedIn()):?>class="active"<?php endif;?> href="elimina-account.php" >Elimina Account</a>
      <a <?php if(isActive("venditori.php") || isEchoVenditoreLoggedIn() || !isEchoUtenteLoggedIn()):?>class="active"<?php endif;?> href="venditori.php" >Venditori</a>
      <a <?php if(isActive("login.php") || !isVenditoreLoggedIn()): ?> class="active"<?php endif;?> href="login.php" >Gestione</a>
      <a id="icon2" <?php  if(isActive("carrello.php") || isEchoVenditoreLoggedIn() || !isEchoUtenteLoggedIn()): ?>class="active"<?php endif;?> href="carrello.php" title="carrello" ><em class="fas fa-cart-arrow-down" ></em></a>
    </nav>
  </header>

  <main>
    <?php if(isset($templateParams["nome"])){
      require($templateParams["nome"]);
    }
    ?>
  </main>

  <footer class="footer">
    <div class="share">
      <a href="#" class="pay">Facebook</a>
      <a href="#" class="pay">Instgram</a>
      <a href="#" class="pay">Twitter</a>
    </div>
  </footer>

  <script src="js/script.js"></script>
</body>

</html>