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
           <div class="logo"><a href="<?= URL_INI; ?>">edit your category: <?= $slugCategory; ?> | <?= $_SESSION['login_user'] ?></a></div>
           <a class="loggout" href="<?= URL_PAINEL; ?>?loggout">Loggout |</a>
           <a class="category" href="<?= URL_PAINEL; ?>">Painel |</a>
        </div><!--container-->
        <div class="clear"></div>
    </header>

    <section class="category-create">
        <div class="container">
            <h2>edit your category</h2>
            <form method="POST" enctype="multipart/form-data">
                <label for="title-news">Name</label>
                    <input type="text" name="name" value="<?= $categorySingle['name']; ?>">
                <input type="submit" name="edit-category" value="edit">
            </form>
        </div><!--container-->
    </section><!--post-news-->
</body>
</html>