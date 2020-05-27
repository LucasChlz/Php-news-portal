<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= URL_SOURCE; ?>/css/painel/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">
  <title>News Portal</title>
</head>
<body>
<header>
  <div class="container">
      <div class="logo"><a href="<?= URL_INI; ?>">News Portal</a></div>
  </div><!--container-->
</header>
<section class="login">
  <form method="POST">
    <h2>Login to your account</h2><br>
      <input type="text" name="login" placeholder="your login...">
      <input type="password" name="password" placeholder="your password">
      <input type="submit" name="login" value="login">
  </form>
</section>
</body>
</html>