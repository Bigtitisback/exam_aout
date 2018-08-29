<!DOCTYPE html >
<html>
<head>
<title>Sites web dynamiques - Cours 1 - Exercices</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="template/css/style.css" />
</head>
<body>
  
  <button class="log-button">Connexion</button>
  <button class="reg-button">Inscription</button>

  <form method="post" action="../controllers/connect.php" class="log-form">
    <label for="log__username-input">Username:</label>
    <input type="text" id="log__username-input" name="username">

    <label for="log__pass-input">Password:</label>
    <input type="password" id="log__pass-input" name="password">

    <button type="submit" id="log__submit">Log in</button>
  </form>


  
  <form method="post" action="../controllers/register.php" class="reg-form">
    <label for="reg__username-input">Username:</label>
    <input type="text" id="reg__username-input" name="username">

    <label for="reg__mail-input">Mail:</label>
    <input type="text" id="reg__mail-input" name="mail">

    <label for="reg__pass-input">Password:</label>
    <input type="password" id="reg__pass-input" name="password">

    <button type="submit" id="reg__submit">Register</button>
  </form>


  <script src="./../public/js/app.js"></script>
</body>
</html>